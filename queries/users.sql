select u.id,u.name,u.email,r.name as role,date_format(u.created_at, "%d-%m-%Y") as join_date from users as u join roles as r on u.role_id=r.id;
