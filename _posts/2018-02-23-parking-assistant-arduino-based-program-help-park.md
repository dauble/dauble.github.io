---
layout: post
title: "Parking Assistant: An Arduino-based Program to Help You Park"
date: 2018-02-23
image: "/assets/images/posts/parking-assistant.jpg"
---
For Christmas this past year I finally got something I've been wanting for a little while: an Arduino controller and small electronics kit. I've had several ideas of little projects, but have never had the time or parts to start working on them. Over the last several weeks though, I've been playing with them and have come up with a few projects. My first project was a simple thermometer and humidity gauge. It worked well and was accurate (within reason) and it ignited a spark for other projects. I got to thinking about what else I could build, then it hit me: how about a parking assistant? We're looking at getting another car and instead of using a 2"x4" block of wood, why not use my technical skills and make something cool. Something to annoy my wife. Enter Parking Assistant.

[![IMAGE ALT TEXT](http://img.youtube.com/vi/WnKiokYo1i4/0.jpg)](http://www.youtube.com/watch?v=WnKiokYo1i4 "Video Title")

This is just a simple project that uses an ultrasonic sensor to determine the range from an object and then display the appropriate color on the matrix. If you get too close though, it displays a flashing red "X" on the matrix. The next steps will be to work on power consumption so I can use it in the garage and run it off either standard electricity or just keep it battery powered for now. We'll see. If you want to play around with it, be sure to check it the [Parking Assistant GitHub project](https://github.com/dauble/Parking-Assistant). Feel free to use it and change it how you want.

**Update (3/18/2018): **
I started noticing that the ultrasonic sensors were receiving input a little too frequently, so updated the code to get the average of five distances, then display that as the distance. This allows it to be more accurate, as it was sending additional triggers before it was receiving the echos, causing invalid ranges.