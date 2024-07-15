import React, { useState } from 'react'

function RecordForm() {
  const [description, setDescription] = useState('')
  const [amount, setAmount] = useState()
  const [category, setCategory] = useState('')
  const [paymentMethod, setPaymentMethod] = useState('')

  const [financialRecords, setFinancialRecords] = useState([])


  const handleSubmit = async (e) => {
    e.preventDefault();

    const record = {
      amount,
      category,
      description,
      paymentMethod
    }

    try {
      await fetch('http://localhost:3001/', {
        method: 'POST',
        headers: { 'content-type': 'application/json' },
        body: JSON.stringify(record)
      })
    } catch (error) {
      console.log(error);
    }

    setFinancialRecords(prev => [...prev, record])

    setAmount('')
    setCategory('')
    setDescription('')
    setPaymentMethod('')
  }

  return (<>
    <div className='record-form font-medium'>
      <form onSubmit={handleSubmit} className=''>
        <div className="form-field">
          <label>Description:</label>
          <input
            type="text"
            required
            className="input"
            value={description}
            onChange={(e) => setDescription(e.target.value)}
          />
        </div>
        <div className="form-field">
          <label>Amount:</label>
          <input
            type="number"
            required
            className="input"
            value={amount}
            onChange={(e) => setAmount(e.target.value)}
          />
        </div>
        <div className="form-field">
          <label>Category:</label>
          <select
            required
            className="input"
            value={category}
            onChange={(e) => setCategory(e.target.value)}
          >
            <option value="">Select a Category</option>
            <option value="Food">Food</option>
            <option value="Rent">Rent</option>
            <option value="Salary">Salary</option>
            <option value="Utilities">Utilities</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div className="form-field">
          <label>Payment Method:</label>
          <select
            required
            className="input"
            value={paymentMethod}
            onChange={(e) => setPaymentMethod(e.target.value)}
          >
            <option value="">Select a Payment Method</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Cash">Cash</option>
            <option value="Bank Transfer">Bank Transfer</option>
          </select>
        </div>
        <button type="submit" className=" bg-sky-600 text-white text-sm p-2 rounded-lg m-2">
          Add Record
        </button>

      </form>
    </div>
  </>
  )
}

export default RecordForm