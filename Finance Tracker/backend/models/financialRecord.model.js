import mongoose from "mongoose";

const financialRecordSchema = mongoose.Schema({
  description: {
    type: String
  },
  category: {
    type: String,
    required: true

  },
  paymentMethod: {
    type: String,
    required: true

  },
  amount: {
    type: Number,
    required: true
  }
}, { timestamps: true })

const financialRecord = mongoose.model('financialRecord', financialRecordSchema)

export default financialRecord;