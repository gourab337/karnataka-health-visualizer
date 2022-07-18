# Karnataka Telemedicine District-Wise Data Visualizer

![alt text](https://github.com/gourab337/karnataka-health-visualizer/blob/main/archive/screenshot.png)
## To setup (For MacOS):

1. Go to root of the repository and run `php -S 127.0.0.1:8000` 
2. Go to `127.0.0.1:8000` to visit the localhost website
3. Setup the `health_main.py` by downloading the following dependencies using pip (or pip3):
  a. `pip install geopandas` or `pip3 install geopandas`
  b. `pip install pyshp` or `pip3 install pyshp`
  c. `pip install bokeh` or `pip3 install bokeh`
  d. `pip install xlrd`



Credits to @vik4114 for map data: `https://github.com/vik4114/map.git`
Maps being plotted using https://bokeh.org/ 

## Regarding input data format:

Please refer to the `dataset.xlsx` file present in the root directory of this repository. The input file name MUST be `dataset.xlsx`, which is an excel file with the same rows and columns. The values of the fields can be updated according to the user.

## Guide:

1. Once the website is up and running, click on `choose file` to select your `dataset.xlsx` file from your local machine. Click on `upload` to upload the file.

2. Click on the `visualize` button to generate the map plot.

3. Once the map has been plotted, a notification will pop up saying the plot is ready.

4. You'll have 3 options: `Show my plot`, `Download SVG`, `Download PNG`.

-  `Show my Plot`: Will open the plot in a new page on your browser. Use this option to visualise and save space in your computer. The file won't be downloaded.

-  `Download SVG`: Download a high quality image of the same plot. This can be used for presentations, etc

-  `Download PNG`: Download the same image in PNG format. PNG format is generally lower resolution than SVG and some texts of the plot might be difficlut to read from the image. 
