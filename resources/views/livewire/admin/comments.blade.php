<div>
    <x-slot name="title">Comments</x-slot>

   <div class="container my-5">
       <div class="card">
           <div class="card-header">
               <h4>comments ( {{count($comment_total)}} )</h4>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered">
                       <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>comment</th>
                            <th>Delete</th>
                        </tr>
                       </thead>
                       <tbody>
                           @forelse ($comments as $comment)
                               <tr>
                                   <td>{{$comment->id}}</td>
                                   <td>{{$comment->name}}</td>
                                   <td>{{$comment->comment}}</td>
                                   <td><button wire:click='delete({{$comment->id}})' class="btn btn-danger">Delete</button></td>
                               </tr>
                           @empty
                               <h4>Comment Not Found</h4>
                           @endforelse
                       </tbody>
                      
                   </table>
               </div>
           </div>
           <div class="card-footer">
            {{$comments->links()}}
           </div>
       </div>
   </div>

</div>
