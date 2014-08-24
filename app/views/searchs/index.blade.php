<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
     {{ HTML::style('http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') }}

        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
          
        {{ HTML::script('js/jquery.searchable.js') }}

        <script type="text/javascript">
            $(function () {
    $( '#table' ).searchable({
        striped: true,
        oddRow: { 'background-color': '#f5f5f5' },
        evenRow: { 'background-color': '#fff' },
        searchType: 'fuzzy'
    });
    
    $( '#searchable-container' ).searchable({
        searchField: '#container-search',
        selector: '.row',
        childSelector: '.col-xs-4',
        show: function( elem ) {
            elem.slideDown(100);
        },
        hide: function( elem ) {
            elem.slideUp( 100 );
        }
    })
});

        </script>
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('usuarios') }}">Usuario Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('usuarios') }}">View All Usuarios</a></li>
        <li><a href="{{ URL::to('usuarios/create') }}">Create a Usuario</a>
    </ul>
</nav>

<h1>Search + ABM</h1>


    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <input type="search" id="search" value="" class="form-control" placeholder="Search using Fuzzy searching">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table" id="table">
                <thead>
                        <tr>
                            <th>First column</th>
                            <th>Second column</th>
                            <th>Third column</th>
                            <th>Fourth column</th>
                        </tr>
                </thead>
                                            <tbody>
                                                @foreach($usuario as $usuario)
                                                            <tr>    
                                                                <td>{{ $usuario->id }}</td>
                                                                <td>{{ $usuario->nombre }}</td>
                                                                <td>{{ $usuario->apellido }}</td>
                                                                <td>    
                                                <a class="btn btn-small btn-success" href="{{ URL::to('usuarios/' . $usuario->id) }}">Show this User</a>
                                               </td>
                                                            </tr>
                                               
                                            </tbody>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>