from project_module import project_object, image_object, link_object, challenge_object

p = project_object('box_plotter', 'Box plotter')
p.domain = 'http://www.aidansean.com/'
p.path = 'box_plotter'
p.preview_image_ = image_object('http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg', 408, 287)
p.github_repo_name = 'box_plotter'
p.mathjax = True
p.links.append(link_object(p.domain, 'box_plotter/', 'Live page'))
p.introduction = 'One of the most popular ways to compare results in particle physics is to create plots that show different results with horizontal bands (sometimes known as boxes), making comparisons easier on the eye.  Unsatisfied with the quality of available solutions at the time, I created my own scripts which would make these plots for use in my thesis.'
p.overview = '''The tool allows the user to create a plot in several steps.  Each entry can be styled quickly and simply, and bands can also be added around different groups of results.  The user can specify up to three uncertainties (for example, statistics, systematic, and theoretical) which can be asymmetric.  The output is an SVG document, giving a very clean and slick image that scales well.  Unfortunately this is not as well suited for creating bitmaps, and also relies on server side (PHP) scripting.'''

p.challenges.append(challenge_object('The axis must be generated dynamically, ensuring that the range looks sensible and attractive.', 'Through some cunning mathematics the range is automatically chosen, with a suitable precision.  Since the aim is to make the comparison by eye of different results easy the precision is less important than giving a good sense of scale, so fewer tick marks are preferred.', 'Resolved'))

p.challenges.append(challenge_object('It\'s currently not possible to enter a block of text to create an image.', 'Add a textarea to input user defined text and a parser to read this input.  This would benefit greatly from a simple custom markup language.', 'To be done'))

p.challenges.append(challenge_object('It would be nice to have an output to HTML canvas.', ' Since the SVG is already written, it would be easy to write to canvas as well.  This would require rewriting the code in Javascript, which is relatively straightforward to do.  If there is demand from the particle physics community I will spend some time refactoring the code.', 'To be done'))
