<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" href="/css/reset.css">
</head>
<style>
  .wrap {
    position:relative;
    width:100vw;
    height:100vh;
    background-color:blue;
  }
  .card {
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    width:50%;
    padding:30px;
    background-color:white;
    border-radius:10px;
  }
  .title {
    margin-bottom:15px;
    font-weight:bold;
    font-size:24px;
  }
  .form-create {
    display:flex;
    justify-content:space-between;
    margin-bottom:30px;
  }
  .input-create {
    width:80%;
    border:1px solid grey;
    border-radius:5px;
    padding:10px 5px;
    font-size:14px;
  }
  .btn-create {
    background-color:white;
    border:2px solid purple;
    border-radius:5px;
    padding:8px 15px;
    font-weight:bold;
    font-size:12px;
    color:purple;
    cursor:pointer;
    transition:0.4s;
  }
  .btn-create:hover {
    background-color:purple;
    color:white;
  }
  table {
    width:100%;
    text-align:center;
  }
  tr {
    height:50px;
  }
  .input-update {
    width:90%;
    border:1px solid grey;
    border-radius:5px;
    padding:5px;
    font-size:14px;
  }
  .btn-update {
    background-color:white;
    border:2px solid orange;
    border-radius:5px;
    padding:8px 15px;
    font-weight:bold;
    font-size:12px;
    color:orange;
    cursor:pointer;
    transition:0.4s;
  }
  .btn-update:hover {
    background-color:orange;
    color:white;
  }
  .btn-delete {
    background-color:white;
    border:2px solid lightgreen;
    border-radius:5px;
    padding:8px 15px;
    font-weight:bold;
    font-size:12px;
    color:lightgreen;
    cursor:pointer;
    transition:0.4s;
  }
  .btn-delete:hover {
    background-color:lightgreen;
    color:white;
  }
</style>
<body>
  <div class="wrap">
    <div class="card">
      <h1 class="title">Todo List</h1>
      <div class="list">
        @if (count($errors) > 0)
        <ul>
          @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
          @endforeach
        </ul>
        @endif
        <form action="/todo/create" method="post" class="form-create">
          @csrf
          <input type="text" name="content" class="input-create">
          <input type="submit" value="追加" class="btn-create">
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach($items as $item)
          <tr>
            <td>{{$item->created_at}}</td>
            <td>
              <form action="/todo/update?id={{$item->id}}" method="post" id="form{{$item->id}}">
                @csrf
                <input type="text" name="content" value="{{$item->content}}" class="input-update">
              </form>
            </td>
            <td><input type="submit" value="更新" form="form{{$item->id}}" class="btn-update"></td>
            <td>
              <form action="/todo/delete?id={{$item->id}}" method="post">
                @csrf
                <input type="submit" value="削除" class="btn-delete">
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>