import sys
import joblib
import json
import numpy as np
import os
import paho.mqtt.client as mqtt

address = "localhost"
port = 1883

def on_connect(client, userdata, flags, reason_code, properties):
    if(reason_code == 0):
        print("Connnected...")
    else:
        print(f"Connection error: {reason_code}")

def on_message(client, data, message):
    messageText = message.payload.decode("utf-8")
    print(f"Message topic: {message.topic}\nmessage text: {messageText}\n")

def main():
    try:
        # Cargar el modelo pkl
        storage_path = sys.argv[1]
        ruta_completa_al_archivo_pkl = os.path.join(storage_path, "scripts", "magic_wand.pkl")

        with open(ruta_completa_al_archivo_pkl, 'rb') as file:
            modelo_scaler = joblib.load(file)
            modelo = modelo_scaler['modelo']
            scaler = modelo_scaler['scaler']
            label_encoder = modelo_scaler['label_encoder']

        # Leer los datos de los argumentos de línea de comandos
        if len(sys.argv) > 1:
            input_data = json.loads(sys.argv[2])  # Decodifica el JSON recibido
            data_list = input_data.get('dataset', [])
            # Convertir las cadenas de texto que representan números a números enteros
            input_data_numerico = [int(d) for d in data_list]

            if isinstance(input_data_numerico, list) and len(input_data_numerico) > 0:
                # Reshape el array para cumplir con la expectativa de un solo feature
                input_data_numerico_reshaped = np.array(input_data_numerico).reshape(1, -1)
                nuevos_datos_standar = scaler.transform(input_data_numerico_reshaped)

                # Hacer la predicción
                prediction = modelo.predict(nuevos_datos_standar)

                class_name = label_encoder.inverse_transform(prediction)[0]

                #MQTT
                try:
                    client = mqtt.Client(mqtt.CallbackAPIVersion.VERSION2)
                    client.on_connect = on_connect
                    client.on_message = on_message
                    client.connect(address, port)

                    client.publish("/" + class_name, class_name)
                except Exception as e:
                    print(f"Error en la conexión MQTT o al enviar el mensaje: {e}")

                # Mostrar la predicción en la consola
                print(class_name)
            else:
                print(f"Datos no válidos para la transformación {input_data}")
                sys.exit(1)  # Código de error
        else:
            print("No se recibieron datos.")
            sys.exit(1)  # Código de error
    except Exception as e:
        # Bloque general para capturar cualquier excepción no manejada previamente
        print(f"Ocurrió un error inesperado: {e}")
        sys.exit(1)  # Código de error

if __name__ == "__main__":
    main()
