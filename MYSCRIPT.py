from flask import Flask, render_template

app = Flask(__name__)

@app.route('/')
def index():
    with open('myfile.txt', 'w') as fp:
        # To write data to new file uncomment
        fp.write("New file created")
    return render_template('index.html')

if __name__ == "__main__":
    app.run(debug=True)