# -*- coding: utf-8 -*-
"""health_main.ipynb

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/1fUNBIOAkGQdeWoEFpdbX-lgHcMhwBaul
"""


import geopandas as gpd
import pandas as pd
import numpy as np
from selenium import webdriver
import chromedriver_autoinstaller

chromedriver_autoinstaller.install()  # Check if the current version of chromedriver exists
                                      # and if it doesn't exist, download it automatically,
                                      # then add chromedriver to path

#!git clone https://github.com/vik4114/map.git

import shapefile
df1 = gpd.read_file('map/District_Boundary.shp')

r = shapefile.Reader("map/District_Boundary.shp")
df1.head()
points = df1.copy()
points.geometry = points['geometry'].centroid
# same crs
points.crs =df1.crs
# print(points['geometry'][0])

#------------part 2
x=[]
y=[]
for i in points['geometry']:
  x.append(i.x)
  y.append(i.y)
# print(y)

#for bengaluru(rural)
beng_x = [x.pop(20)]
beng_y = [y.pop(20)]

df1 = df1.rename(columns={'KGISDist_1': 'District'})

import pandas as pd
zones = pd.read_excel('dataset.xlsx',
              sheet_name='dataset')  

# zones = pd.read_csv('drive/MyDrive/31.csv')
#%HWC
HWC_percent=[]
i=0
while i<zones.shape[0]:
  res = (zones['A-HWC'][i]/zones['T- HWC'][i])*100
  # print(zones['District'][i],res)
  HWC_percent.append(res)
  i+=1
zones['%HWC']=HWC_percent
#HWC

lis=[]
i=0
while(i<zones.shape[0]):
  if 0<=int(zones['%HWC'][i])<=25:
    lis.append('Red')
  elif 25<int(zones['%HWC'][i])<=50:
    lis.append('Yellow')
  elif 50<int(zones['%HWC'][i])<=75:
    lis.append('Orange')
  elif 75<int(zones['%HWC'][i])<=100:
    lis.append('Green')
  
  else:
    lis.append('Gray')
  i+=1

zones['Zone']=lis
zones.info()
newdf = df1.merge(zones, on = ['District'])
newdf = newdf.drop(columns = ['created_us', 'last_edite', 'last_edi_1','created_da'])
#for bengaluru(rural)
beng_df = newdf.loc[newdf["District"] == "Bengaluru (Rural)"]
bebg_df = pd.DataFrame(beng_df)
beng_dist = [beng_df["District"][20]+" : "+str(round(HWC_percent[20], 2))+"%"]
beng_hwcs = ["HWCs: "+str(beng_df["HWCs"][20])]
beng_login = ["Login: "+str(beng_df["Login"][20])]
beng_thwc = ["HWC-T: "+str(beng_df["T- HWC"][20])+"  "+ "HWC-A: "+str(beng_df["A-HWC"][20])]
beng_topd = ["OPD-T: "+str(beng_df["T- OPD"][20])+"   "+ "OPD-A: "+str(beng_df["A-OPD"][20])]
beng_feature = [beng_dist, beng_login, beng_hwcs, beng_thwc, beng_topd]
# for bengaluru(rural)
newdf = newdf.drop(20)
districtList=[]
hwcsList=[]
loginList=[]
thwcList=[]
topdList = []
ahwcList = []
aopdList = []

i=0
while(i<=newdf.shape[0]):
  if i!=20:
    districtList.append(newdf['District'][i]+" : "+str(round(HWC_percent[i], 2))+"%")
    hwcsList.append("HWCs: "+str(newdf['HWCs'][i]))
    loginList.append("Login: "+str(newdf['Login'][i]))
    thwcList.append("HWC-T: "+str(newdf['T- HWC'][i]))
    topdList.append("OPD-T: "+str(newdf['T- OPD'][i]))
    ahwcList.append("HWC-A: "+str(newdf['A-HWC'][i]))
    aopdList.append("OPD-A: "+str(newdf['A-OPD'][i]))
  i+=1
i = 0
while i<len(thwcList):
  thwcList[i] = thwcList[i]+"  "+ahwcList[i]
  topdList[i] = topdList[i]+"  "+aopdList[i]
  i+=1
#---------------part 2

#---------------part 3
import json
from bokeh.io import show
from bokeh.io import output_file, save
from bokeh.models import ColumnDataSource, Grid, LinearAxis, Plot, Text, LabelSet,Label,Title
from bokeh.models import (CDSView, ColorBar, ColumnDataSource,
                          CustomJS, CustomJSFilter, 
                          GeoJSONDataSource, HoverTool,LogTicker,
                          CategoricalColorMapper, LinearColorMapper, Slider)
from bokeh.layouts import column, row, widgetbox
from bokeh.io import output_notebook
from bokeh.plotting import figure
from bokeh.palettes import brewer
from bokeh.io import output_file, save, export_png, export_svgs

feature_list = [districtList,hwcsList,loginList,thwcList,topdList]
source_list=[]
for i in feature_list:
  source = ColumnDataSource(data=dict(x=x, y=y, names=i))
  source_list.append(source)
src = source_list[0]

geosource = GeoJSONDataSource(geojson = newdf.to_json())

# bengaluru
source_list_beng=[]
for i in beng_feature:
  source = ColumnDataSource(data=dict(x=beng_x, y=beng_y, names=i))
  source_list_beng.append(source)
src_beng = source_list_beng[0]

geosource_beng = GeoJSONDataSource(geojson = beng_df.to_json())
#bengaluru


# Define color palette
palette = ['Red','Yellow','Orange','Green']
color = ['#DC5039','#FFE945','#FD9F6C','#35B778']
color_mapper = CategoricalColorMapper(palette = color, factors = palette)
#bengaluru
color_mapper_beng = CategoricalColorMapper(palette = [color[0]], factors = [lis[20]])

#bengaluru

# Create figure object.
q = figure(plot_height = 2000 ,
           plot_width = 1500, 
           toolbar_location = 'right',
           tools = "pan, wheel_zoom, box_zoom, reset")
title = 'Less than 25% ________________________________25% - 50% ____________________________50% - 75%____________________________75% - 100%'
q.add_layout(Title(text=title, text_font_size="12pt", align='center'), 'above')
# q.title.text_font_size = '12pt'
# q.title.align = 'center'

q.xgrid.grid_line_color = None
q.ygrid.grid_line_color = None

labels = LabelSet(x='x', y='y', text='names', 
              x_offset=-40, y_offset=25, source=src, render_mode='canvas',text_font_size="10pt", text_font_style="bold")
q.add_layout(labels)
y_off = 25
for src in source_list[1:]:
  y_off -= 15
  labels = LabelSet(x='x', y='y', text='names', 
                x_offset=-40, y_offset=y_off, source=src, render_mode='canvas',text_font_size="7pt", text_font_style="bold")
  q.add_layout(labels)

#bengaluru
labels = LabelSet(x='x', y='y', text='names', 
              x_offset=-65, y_offset=37, source=src_beng, render_mode='canvas',text_font_size="10pt", text_font_style="bold")
q.add_layout(labels)
y_off = 37
for src in source_list_beng[1:]:
  y_off -= 12
  labels = LabelSet(x='x', y='y', text='names', 
                x_offset=-65, y_offset=y_off, source=src, render_mode='canvas',text_font_size="7pt",text_font_style="bold")
  q.add_layout(labels)
#bengaluru
from datetime import date
today = date.today()
current_time = today.strftime("%d/%m/%Y")

color_bar = ColorBar(color_mapper=color_mapper, ticker=LogTicker(),
                 label_standoff=6, border_line_color=None, location=(0,0))
q.add_layout(color_bar, 'above')
q.add_layout(Title(text="E-Sanjeevani HWC Telemedicine Status as on "+current_time, text_font_size="16pt", align='center'), 'above')
# Add patch renderer to figure.
states = q.patches('xs','ys', source = geosource,
                   fill_color = {'field' :'Zone',
                                 'transform' : color_mapper},
                   line_color = 'black',
                   line_width = 0.25, 
                   fill_alpha = 1)

#bengaluru
states = q.patches('xs','ys', source = geosource_beng,
                   fill_color = {'field' :'Zone',
                                 'transform' : color_mapper_beng},
                   line_color = 'black',
                   line_width = 0.25, 
                   fill_alpha = 1)



#bengaluru
"""
# Create hover tool
p.add_tools(HoverTool(renderers = [states],
                      tooltips = [('District','@District'),
                                  ('Range','@Range')
                                 ]))
"""
#---------------part 3
#---------------part 4
st='plot.html'
export_png(q, filename="plot.png")
output_file(st, mode='inline')
q.output_backend = 'svg'
export_svgs(q, filename = "plot.svg")
save(q)



















