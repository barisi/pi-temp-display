import MySQLdb
import random

# Simulate a temperature reading
temperature_reading = random.uniform(19.0, 30.0)

# Send temperature reading to database
# First, grab a connection to the database
db = MySQLdb.connect(host="localhost", user="root", passwd="changeme", db="temperature_readings")
with db:
        # Then, create a cursor
        db_cursor = db.cursor()
        db_cursor.execute("INSERT INTO temperature_readings(temperature) VALUES (%s)", temperature_reading)
