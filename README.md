## documentation

# Laravel-Task-API

#### register

```http
  POST /register
```

| Parameter  | Type     | Description                   |
| :--------- | :------- | :---------------------------- |
| `name`     | `string` | **required, max:255**.        |
| `email`    | `string` | **required, email, max:255**. |
| `password` | `string` | **required, min:6**.          |

#### login

```http
  POST /login
  Desponse : sanctum
```

| Parameter  | Type     | Description                            |
| :--------- | :------- | :------------------------------------- |
| `email`    | `string` | **required_email_exists:users,email**. |
| `password` | `string` | **Required**.                          |

#### get my tasks

```http
  GET /tasks
```

#### create new task

```http
  POST /tasks/create
```

| Parameter     | Type     | Description                                    |
| :------------ | :------- | :--------------------------------------------- |
| `title`       | `string` | **required,max:500,unique**.                   |
| `description` | `string` | **optional**.                                  |
| `description` | `string` | **required,in:pending,in_progress,completed**. |
| `description` | `string` | **required,date**.                             |


#### update task

```http
  POST /tasks/update/id
```

| Parameter     | Type     | Description                                    |
| :------------ | :------- | :--------------------------------------------- |
| `title`       | `string` | **required,max:500**.                   |
| `description` | `string` | **optional**.                                  |
| `description` | `string` | **required,in:pending,in_progress,completed**. |
| `description` | `string` | **required,date**.                             |


#### delete task

```http
  POST /tasks/delete/id
```



