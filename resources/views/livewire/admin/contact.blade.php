<div>
    <x-slot name="title">Contact</x-slot>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h4>Contacts ( {{count($total_contents)}} )</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                         <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Message</th>
                             <th>Delete</th>
                         </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{$contact->id}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td><button wire:click='delete({{$contact->id}})' class="btn btn-danger">Delete</button></td>
                                </tr>
                            @empty
                                <h4>Contact Not Found</h4>
                            @endforelse
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{$contacts->links()}}
 </div>
 