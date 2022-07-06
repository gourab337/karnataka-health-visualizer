def index():
    with open('myfile.txt', 'w') as fp:
        # To write data to new file uncomment
        fp.write("New file created")


if __name__ == "__main__":
    index()