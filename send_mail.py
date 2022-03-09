#!/usr/bin/env python3

try:
    from argparse import ArgumentParser
    from smtplib import SMTP
    from email.mime.text import MIMEText
    from email.mime.multipart import MIMEMultipart
    from email.mime.application import MIMEApplication
    from email import encoders
except ModuleNotFoundError as err:
    exit(err)

class Sender(object):
    def __init__(self, StudentEmail, ProfesseurEmail, Matiere, Date, Time):
        self.StudentEmail = StudentEmail
        self.ProfesseurEmail = ProfesseurEmail
        self.Matiere = Matiere
        self.Date = Date
        self.TimeDebut = Time.split('__')[0]
        self.TimeFin = Time.split('__')[1]
        self.GoogleSMTPServerIP = "smtp.gmail.com"
        self.GoogleSMTPServerPort = 587
        self.msgObj = None
        self.SenderEmail = "janah.y4ss3r@gmail.com"
        self.SenderPassword = "PUT HERE YOUR PASSWORD (^_^)"
        self.IndexHTMLFile = "emails/index.html"

    def send(self):
        server = SMTP(self.GoogleSMTPServerIP, self.GoogleSMTPServerPort)
        server.ehlo()
        server.starttls()
        try:
            server.login(self.SenderEmail, self.SenderPassword)
        except smtplib.SMTPAuthenticationError as err:
            exit(err)
        text = self.msgObj.as_string()
        try:
            server.sendmail(self.SenderEmail, self.StudentEmail, text)
        except Exception as reason:
            exit(reason)
        server.quit()

    def prepare(self):
        text = open(self.IndexHTMLFile, mode="r").read()
        text = text.replace('#module#', self.Matiere)
        text = text.replace('#date#', self.Date)
        text = text.replace('#heure_debut#', self.TimeDebut)
        text = text.replace('#heure_fin#', self.TimeFin)
        text = text.replace('#prof_email#', self.ProfesseurEmail)
        self.msgObj = MIMEMultipart('alternative')
        self.msgObj["From"] = "no-reply@absenceApp.ma"
        self.msgObj["To"] = self.StudentEmail
        self.msgObj["Subject"] = "NEW ABSENCE".upper()
        self.msgObj.attach(MIMEText(text, "html"))
        return self


def main():
    #"python send_mail.py -e ".$enregistrement['emailEtu']." -p ".$enregistrement2['login']." -m ".$matiere." -d ".$date." -t ".$heure_debut."__".$heure_fin
    parser = ArgumentParser()
    parser.add_argument('-e', '--student', help="Student Email")
    parser.add_argument('-p', '--professeur', help="Professeur Email")
    parser.add_argument('-m', '--matiere', help="Matiere")
    parser.add_argument('-d', '--date', help="Date")
    parser.add_argument('-t', '--time', help="Time")
    args = parser.parse_args()
    
    if all([args.student, args.professeur, args.matiere, args.date, args.time]):
        print("*** Sending email....")
        sender = Sender(args.student, args.professeur, args.matiere, args.date, args.time)
        sender.prepare().send()


if __name__ == "__main__":
    try:
        main()
    except KeyboardInterrupt:
        exit("CTRL+C Detected ...")
    except Exception as err:
        exit(err)
    





















    
