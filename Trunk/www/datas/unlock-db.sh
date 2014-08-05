echo ".dump" | sqlite3 public_storms.db | sqlite3 public_storms.db.new
chmod -c 777 public_storms.db.new
mv public_storms.db public_storms.db.bak
mv public_storms.db.new public_storms.db

echo ".dump" | sqlite3 users.db | sqlite3 users.db.new
chmod -c 777 users.db.new
mv users.db users.db.bak
mv users.db.new users.db
