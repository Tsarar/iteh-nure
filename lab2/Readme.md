
Fields:
"name",
"price",
"amount",
"vendor",
"category",
"reviews",
"condition"

db.products.insert( [{ name: "Item1", price: 15.0, amount: 0, vendor: "Microsoft", category: "Display", "reviews": [ {_id: 1, text: "good"},  {_id: 2, text: "bad"} ], condition: "New"}, { name: "Item2", price: 150.0, amount: 1, vendor: "Nissan", category: "Glasses", "reviews": [ {_id: 5, text: "big"},  {_id: 6, text: "small"}, ], condition: "Used"}, { name: "Item3", price: 1.5, amount: 0, vendor: "Google", category: "Food", "reviews": [ {_id: 4, text: "tasty"} ], condition: "Fresh"}, { name: "Item4", price: 800.0, amount: 200, vendor: "Epicentr", category: "Guitar", "reviews": [ ], condition: "Brand New"}, { name: "Item5", price: 25.0, amount: 1, vendor: "Epicentr", category: "Display", "reviews": [ ], condition: "Brand New"}] )


перечень производителей, с которыми работает магазин;
db.products.distinct("vendor")

товары, отсутствующие на складе (т.е. вообще они есть, но сейчас количество 0);
db.products.find({amount: 0}, {_id: 0}).pretty()

товары в выбранном ценовом диапазоне.
db.products.find({ "price": { $gte: 1, $lt: 10 }}, {_id: 0}).pretty()
