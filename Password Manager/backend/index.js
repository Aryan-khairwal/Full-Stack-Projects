import express from 'express'
import dotenv from 'dotenv'
import bodyParser from 'body-parser'
import cors from 'cors'

const app = express()

import { MongoClient, ObjectId } from 'mongodb'

dotenv.config()
app.use(cors())
app.use(bodyParser.json())

// Connection URL
const url = 'mongodb://localhost:27017'
const client = new MongoClient(url);
const dbName = 'passwordManager';

// Use connect method to connect to the server
await client.connect();
console.log('Connected successfully to server');

const db = client.db(dbName);
const collection = db.collection('passwords');

// collection.insertOne({ site: "site3", password: "12345", username: "user2" })

app.get('/', async (req, res) => {

  const passwords = await collection.find({}).toArray()
  res.json(passwords)

})

app.post('/', async (req, res) => {
  const password = req.body
  collection.insertOne(password)
  res.send({ success: true })

})

app.delete('/', (req, res) => {
  const id = req.body
  collection.deleteOne({ _id: new ObjectId(id) })
  res.send(req.body)
})
app.listen(process.env.PORT, () => {
  console.log(`"Listening on ${process.env.PORT}"`);
})