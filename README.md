# condor-test

#### To implement new source, developer needs to follow the Sources\Source interface implementation and add it into Sources\Register


- Two methods are implemented into SourceController [index, getBySource]

- to call all sources SourceController@index

- to call specific source its used sourceController@getBySource

- routing system is not implemented but hardcoded and if user add in query string parametar ?source=db1 for example it will call getBySource method

- also both endpoints will expect query string parameter month