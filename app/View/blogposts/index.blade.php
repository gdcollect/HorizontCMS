@extends('layout')

@section('content')
<div class='container main-container'>

<h2>Posted news <small class='pull-right' style='margin-top:1.5%;'>All: {{$number_of_blogposts}}</small></h2></br>
<div class='container'>
  <a href='blogpost/create' class='btn btn-primary' style='margin-bottom:20px;'>{{trans('blogpost.new_post_button')}}</a>
</div>

<table class='table table-hover'>
    <thead>
      <tr>
      	<th>Id</th>
        <th>Image</th>
      	<th>Title</th>
      	<th>Comments</th>
        <th>Date</th>
        <th>Author</th>
        <th>Category</th>
        <th><center>Action</center></th>
      </tr>
    </thead><tbody>



<?php foreach($all_blogposts as $blogpost): ?>

<tr>
  <td><?= $blogpost->id ?></td>


  <td><img src='{{$blogpost->getThumb()}}'  class='img img-rounded' style='object-fit:cover;' width=70 height=50 /> </td>


  <td  class='col-md-5'><a href='blogpost/show/{{ $blogpost->id }}' >{{ $blogpost->title }}</a></td>
  		 <td><center><span class="badge" style='font-size:14px'>{{ count($blogpost->comments) }}</span></center></td>
  

  <td><?= $blogpost->created_at->format('Y-m-d'); ?></br><font size='2'><i>at</i> <?= $blogpost->created_at->format('H:i:s'); ?></font></td>
         <td><a href='user/show/{{ $blogpost->author->id }}' >
         {{ $blogpost->author->username }}</a></td>
         <td><span class="label label-success" style='font-size:14px; display:block'>{{ $blogpost->category->name }}</span></td>



  <td>
    <center>

       <div class="btn-group" role="group">
           <a href='blogpost/edit/{{ $blogpost->id }}' type="button" class="btn btn-warning btn-sm" style='min-width:70px;'>Edit</a>
           <a type="button" data-toggle='modal' data-target=.delete_<?= $blogpost->id ?> class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
       </div>

        </center>
  </td>
</tr>

<?php 

  /* Bootstrap::delete_confirmation(
    "delete_".$blogpost->id."",
    "Are you sure?",
    "<b>Delete this post: </b>".$blogpost->title." <b>?</b>",
    "<a href='admin/blogpost/delete/".$blogpost->id."' type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Delete</a>
    <button type='button' class='btn btn-default' data-dismiss='modal'>Cencel</button>"
    );*/

?>


<?php endforeach; ?>


</tbody>
  </table>

    <center>
        {{$all_blogposts->links()}}
    </center>

</div>
@endsection