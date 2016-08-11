# civics
US Citizenship/Naturalization Test Flash Cards. Because.. ignorance is not cool :-)

This OctoberCMS plugin provides an easy drop-in package to help you brush up on your (US) civic knowledge.

The civics flash cards can be accessed by placing the 'questionnaire' component on any page.
```
{% component 'myQuestionnaire' %}
```

## Features
1. Property to randomize order of questions
2. Uses a self-contained table installed along with the package
3. Seed file for list of questions is provided. So, if/when answers to questions do change,
updating the system is as easy as updating the seed file and re-seeding (refreshing the plugin)
4. Simple styling with Twitter Bootstrap (3.0)
5. The component exposes the entire table row as 'row' (in case you want to customize the look and feel)
   the fields are ('id', 'question','answer' and 'extra'). The 'answer' field could contain multiple strings separated by a pipe ('|')
   The 'extra' field contains a url for more information.
