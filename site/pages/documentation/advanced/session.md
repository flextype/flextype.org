---
title: Session
description: Documentation for Fansoro Developers and Fansoro Users.
template: documentation
---

Session class.

### Starts the session.
```
Session::start();
```

### Deletes one or more session variables.
```
Session::delete('user');
```

### Destroys the session.
```
Session::destroy();
```

### Checks if a session variable exists.
```
if (Session::exists('user')) {
    // Do something...
}
```

### Gets a variable that was stored in the session.
```
$user = Session::get('user');
```

### Returns the sessionID.
```
$session_id = Session::getSessionId();
```

### Stores a variable in the session.
```
Session::set('user', 'Awilum');
```
