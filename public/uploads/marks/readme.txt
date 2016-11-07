Author
======

This demo was made by Emil Persson, AKA Humus.
http://www.humus.name



Running the demo
================

There are two variants of the demo, one compiled to be as tiny as possible and fits within the 1Kb limit,
and one that's somewhat more fully featured and interesting to watch but slightly larger than 1Kb. The
latter kind has "-Full-" in the filename. For the tiny version, run the one that matches your desktop
resolution as it is not setting the display mode for you. The full version sets the display mode, so you
can run any resolution of your preference. The tiny version runs through a limited set of predefined
coordinates to zoom to. The full version searches random "interesting" coordinates and thus will appear
different every time you run it.



Legal stuff
===========

This demo is freeware and may be used by anyone for any purpose
and may be distributed freely to anyone using any distribution
media or distribution method as long as this file is included.



Troubleshooting
===============

Is there a problem running the demo?
Refer to my site for information and ways to contact me if there is a problem.
I appreciate bug-reports and feedback.


Compiling code
==============

To compile this code to a tiny binary you need to link with Crinkler (http://www.crinkler.net).
Copy crinkler.exe to the solution directory and rename to link.exe. Then add $(SolutionDir) at
the top of the list to your "Executable files" in your directory search paths so that MSVC finds
it when it links.
If there are any problems, refer to my site for ways to contact me.
