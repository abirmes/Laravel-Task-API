# Laravel-Task-API


## Introduction

Ce projet est une application de gestion de tâches développée avec Laravel.
Elle permet aux utilisateurs de créer, modifier, et suivre l’avancement de leurs tâches.
L’objectif est d’offrir un outil simple pour organiser les activités personnelles ou professionnelles.



## Fonctionnalités
L’application propose plusieurs routes principales :
/tasks : permet de lister, créer, mettre à jour et supprimer des tâches.
/users : gestion des utilisateurs, leur authentification et leur association aux tâches.



## Documentation


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

#### get authenticated person tasks

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
| `title`       | `string` | **required,max:500**.                          |
| `description` | `string` | **optional**.                                  |
| `description` | `string` | **required,in:pending,in_progress,completed**. |
| `description` | `string` | **required,date**.                             |

#### delete task

```http
  POST /tasks/delete/id
```

