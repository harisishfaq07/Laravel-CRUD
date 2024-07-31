<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />

</head>
<body>
@if(Session::has('success'))
                            <div class= "alert alert-success">
                                {{Session::get('success')}}
                            </div>
@endif

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class= "card-header bg-primary">
                        <h3 class="text-white">Create Post</h3>
                    </div>
                    <div class="card-body">
   
                      
                        <form method="POST" action="/posts" id="contactUSForm">
                            {{ csrf_field() }}
                               
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        <input type="text" name="description" class="form-control" placeholder="description" value="{{ old('description') }}">
                        
                                    </div>
                                </div>

                               
                                        <input type="hidden" name="password" class="form-control" placeholder="password" value="123">
                        
</div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body class="container">

<h2>All Posts - {{$count}}</h2>

<table>
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>

  @foreach ($posts as $post)
       <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['description']}}</td>
        <td style="display: flex;">
            

        <form method="get" action="posts/{{$post['id']}}/edit">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success btn-submit" style="background-color: #017BFE">Edit</button>
        </form>
            <span style="margin-left: 10px;"></span>
        <form method="post" action="/posts/{{$post['id']}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-success btn-submit" style="background-color: tomato">Delete</button>
        </form>
        </td>
       </tr>
 @endforeach

  

</table>

</body>
</html>

