<h2>Hey {{$user->name}}!</h2>
<p>Welcome to <strong>{{config('app.name','Yap')}}</strong> - your space to share thoughts.</p>
<p>Ready to write your first post?</p>
<a href="{{route('posts.index')}}" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background-color:purple; color: white; text-decoration: none; border-radius: 5px">Start Posting</a>
<p style="margin: 30px; font-size: .09em; color: #888">Happy Posting!<br>The {{config('app.name', 'Yap')}} Team</p>
