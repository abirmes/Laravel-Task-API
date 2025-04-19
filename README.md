## documentation

# HackathonWithUs

#### register

```http
  POST /register
  Default ROLE => user
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **required, max:255**. |
| `email` | `string` | **required, email, max:255**. |
| `password` | `string` | **required, min:6**. |