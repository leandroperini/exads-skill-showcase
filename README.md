# A showcase for development skills

### How to setup the project

```
make setupEnv
```

This will build and start the containers, install all composer modules and setup the database structure together with
initial data.

When the previous command finish, is required to add the following entry on your hosts file

```
127.0.0.1   exads.local
```

After all the steps above the project will be available at:

```
http://exads.local:8080
```

----

#### To easy the test was created make commands to trigger each test case.

**1. Prime Numbers**

```
make 1
```

---
**2. ASCII Array - Custom Char**

```
make 2 char={replace this with an ASCII char from "," to "|"}
```

Example:

```
make 2 char=J
```

**2. ASCII Array - Random Char**

```
make 2-random
```

---
**3. TV Series - Custom weekday and time**

```
make 3 week-day={from 1 to 7} time={from 0 to 23}
```

Example:

```
make 3 week-day=2 time=19
```

**3. TV Series - Current weekday and time**

```
make 3-now
```

---
**4. A/B Testing**

```
make 4 promo={promotion id}
```

Example:

```
make promo=1
```