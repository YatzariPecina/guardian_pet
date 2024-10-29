import paho.mqtt.client as mqttClient
import time

address = "165.227.99.106"
port = 1883
topic = "/test"

def on_connect(client, userdata, flags, reason_code, properties):
    if(reason_code == 0):
        print("Connnected...")
    else:
        print(f"Connection error: {reason_code}")

def on_message(client, userdata, msg):
    messageText = msg.payload.decode("utf-8")
    print(f"Message topic: {msg.topic}\nmessage text: {messageText}\n")

client = mqttClient.Client(mqttClient.CallbackAPIVersion.VERSION2)
client.on_connect = on_connect
client.on_message = on_message
client.connect(address, port)
client.subscribe(topic)

counter = 0
while(counter < 30):
    client.loop_start()
    time.sleep(1)
    client.loop_stop()
    counter += 1