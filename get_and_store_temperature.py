import MySQLdb
import subprocess

# Simulate a temperature reading
temperature_reading = subprocess.check_output("sudo temperv14 -c", shell=True)

# Send temperature reading to database
# First, grab a connection to the database
db = MySQLdb.connect(host="localhost", user="root", passwd="changeme", db="temperature_readings")
with db:
        # Then, create a cursor
        db_cursor = db.cursor()
        db_cursor.execute("INSERT INTO temperature_readings(temperature) VALUES (%s)", temperature_reading)
