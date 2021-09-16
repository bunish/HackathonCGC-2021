import pyttsx3
import speech_recognition as sr
import datetime
import webbrowser
import os
import smtplib
engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice', voices[0].id)


def speak(audio):
    engine.say(audio)
    engine.runAndWait()


def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour >= 0 and hour < 12:
        speak("Good Morning!")

    elif hour >= 12 and hour < 18:
        speak("Good Afternoon!")

    else:
        speak("Good Evening!")

    speak("I am Your Medical Assistant Sir. Please tell me how may I help you today")


def takeCommand():

    r = sr.Recognizer()
    with sr.Microphone() as source:

        print("Listening...")
        r.pause_threshold = 1
        r.adjust_for_ambient_noise(source, duration=1)
        audio = r.listen(source)

    try:
        print("Recognizing...")
        query = r.recognize_google(audio, language='en-in')
        print(f"User said: {query}\n")

    except Exception as e:
        # print(e)
        print("Say that again please...")
        return "None"
    return query


# Register Chrome as Browser
webbrowser.register('Chrome', None, webbrowser.BackgroundBrowser(
    'C:\Program Files (x86)\Google\Chrome\Application\chrome.exe'))

run = True
if __name__ == "__main__":
    wishMe()
    while run:

        query = takeCommand().lower()

        if 'open youtube' in query:
            webbrowser.register('Chrome', None, webbrowser.BackgroundBrowser(
                'C:\Program Files (x86)\Google\Chrome\Application\chrome.exe'))
            webbrowser.get('Chrome').open_new_tab("youtube.com")

        elif 'open google' in query:
            webbrowser.get('Chrome').open_new_tab("google.com")

        elif 'open stackoverflow' in query:
            webbrowser.open("stackoverflow.com")

        elif 'my project' in query:
            webbrowser.open(
                "http://localhost:8080/DoctorPatient/applicationlayer/Doctorpatient.php")

        elif 'login as doctor' in query:
            webbrowser.open(
                "http://localhost:8080/DoctorPatient/applicationlayer/login2.php")

        elif 'login as patient' in query:
            webbrowser.open(
                "http://localhost:8080/DoctorPatient/applicationlayer/login.php")

        elif 'admin panel' in query:
            webbrowser.open(
                "http://localhost:8080/DoctorPatient/applicationlayer/login3.php")

        elif 'college' in query:
            webbrowser.open("https://www.cgc.ac.in/")

        elif 'fever' in query:
            speak("Take your temperature and assess your symptoms. ...Stay in bed and rest.Keep hydrated. ...Take over-the-counter medications like acetaminophen and ibuprofen to reduce fever. ...Stay cool")

        elif 'cough' in query:
            speak("drinking plenty of water")
            speak("sipping hot water with honey")
            speak("taking over-the-counter cough medicines")
            speak("taking a steamy shower")
            speak("At Last Take Rest, Thank You")

        elif 'play music' in query:
            music_dir = 'C:\\Users\\Dell\\Desktop\\Songs'
            songs = os.listdir(music_dir)
            print(songs)
            os.startfile(os.path.join(music_dir, songs[0]))

        elif 'time' in query:
            strTime = datetime.datetime.now().strftime("%H:%M:%S")
            speak(f"Sir, the time is {strTime}")

        elif 'how are you' in query:
            speak('I am good, Are you feeling well today?')

        elif 'feeling well' in query:
            speak('Its great, can i help you in any other way?')

        elif 'close' in query:
            run = False
