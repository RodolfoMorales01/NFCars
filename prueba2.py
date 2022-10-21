
#!/usr/bin/python3

#import subprocess
import time
import requests

from subprocess import Popen, PIPE
#process = Popen(['swfdump', '/tmp/filename.swf', '-d'], stdout=PIPE, stderr=PIPE)
#stdout, stderr = process.communicate()

def nfc_raw(): #Ejecuta el comando "C" y se guarda el dato
    process = Popen(['/usr/bin/nfc-poll'], stdout=PIPE, stderr=PIPE)
    stdout, stderr = process.communicate()
    #print "stdout"+stdout
    #print "stderr"+stderr
    #lines=subprocess.check_output("/usr/bin/nfc-poll", stderr=open('/dev/null','w'))
    return stdout

def read_nfc():
    lines=nfc_raw()
    return lines
while(1):
  try:
    myLines=read_nfc()
    buffer=[]
    for line in myLines.splitlines():
        line_content=line.split()
        
        if(not line_content[0] =='UID'):
            pass
        
        else:
            buffer.append(line_content)
            str=buffer[0]
            id_str=str[2]+str[3]+str[4]+str[5]
            print (id_str)
            link = "http://localhost/tesis/php/agregar.php?id="+id_str
            f = requests.get(link)
            print (f.text)
            
  except KeyboardInterrupt:
    pass

