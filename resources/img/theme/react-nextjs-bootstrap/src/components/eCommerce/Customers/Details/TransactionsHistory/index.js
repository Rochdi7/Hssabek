"use client";

import { Card, Form, Table } from "react-bootstrap";
import Pagination from "./Pagination";

const transactionsHistoryData = [
  {
    id: '#JAN-121',
    status: 'pending',
    amount: '$6,855.00',
    rewards: '$12.00',
    date: '14 Jan 2024'
  },
  {
    id: '#JAN-120',
    status: 'successful',
    amount: '$258.00',
    rewards: '$9.00',
    date: '13 Jan 2024'
  },
  {
    id: '#JAN-119',
    status: 'rejected',
    amount: '$3,890.00',
    rewards: '$11.00',
    date: '12 Jan 2024'
  },
  {
    id: '#JAN-118',
    status: 'successful',
    amount: '$2,500.00',
    rewards: '$23.42',
    date: '11 Jan 2024'
  },
  {
    id: '#JAN-117',
    status: 'successful',
    amount: '$8,200.00',
    rewards: '$10.84',
    date: '10 Jan 2024'
  },
  {
    id: '#JAN-116',
    status: 'rejected',
    amount: '$640.00',
    rewards: '$3.21',
    date: '09 Jan 2024'
  },
  {
    id: '#JAN-115',
    status: 'successful',
    amount: '$9,100.00',
    rewards: '$43.21',
    date: '08 Jan 2024'
  },
  {
    id: '#JAN-114',
    status: 'pending',
    amount: '$7,300.00',
    rewards: '$42.42',
    date: '07 Jan 2024'
  },
  {
    id: '#JAN-113',
    status: 'successful',
    amount: '$2,800.00',
    rewards: '$11.21',
    date: '06 Jan 2024'
  },
  {
    id: '#JAN-112',
    status: 'successful',
    amount: '$6,600.00',
    rewards: '$14.32',
    date: '05 Jan 2024'
  },
];

const TransactionsHistory = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Transactions History</h3>

            <Form.Select
              className="month-select form-control border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">Last Day</option>
              <option defaultValue="2">Last Week</option>
              <option defaultValue="3">Last Month</option>
              <option defaultValue="4">Last Year</option>
            </Form.Select>
          </div>

          <div className="default-table-area recent-orders">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Rewards</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  {transactionsHistoryData &&
                    transactionsHistoryData.slice(0, 10).map((defaultValue, i) => (
                      <tr key={i}>
                        <td>
                          {defaultValue.id}
                        </td>
                        <td>
                          <span 
                            className={`badge p-2 fs-12 fw-normal text-capitalize ${defaultValue.status}`}
                          >
                            {defaultValue.status}
                          </span>
                        </td>
                        <td>{defaultValue.amount}</td>
                        <td>{defaultValue.rewards}</td>
                        <td>{defaultValue.date}</td>
                      </tr>
                    ))}
                </tbody>
              </Table>
            </div>

            {/* Pagination */}
            <Pagination />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TransactionsHistory;
