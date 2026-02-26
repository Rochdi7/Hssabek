"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Image from "next/image";

const transactionsData = [
  {
    img: "/images/cardano.png",
    coin: "Bitcoin",
    symbol: "BTC",
    date: "2024-09-10",
    amount: "0.50 BTC",
    price: "$27,000",
    type: "Buy",
    totaldefaultValue: "$13,500",
  },
  {
    img: "/images/ethereum-2.png",
    coin: "Ethereum",
    symbol: "ETH",
    date: "2024-09-08",
    amount: "5.00 ETH",
    price: "$1,750",
    type: "Sell",
    totaldefaultValue: "$8,750",
  },
  {
    img: "/images/binance-2.png",
    coin: "Binance",
    symbol: "BNB",
    date: "2024-09-05",
    amount: "100 SOL",
    price: "$250",
    type: "Buy",
    totaldefaultValue: "$3,500",
  },
  {
    img: "/images/tether.png",
    coin: "Tether",
    symbol: "USDT",
    date: "2024-08-30",
    amount: "10 BNB",
    price: "$1.00",
    type: "Buy",
    totaldefaultValue: "$2,500",
  },
  {
    img: "/images/xrp.png",
    coin: "XRP",
    symbol: "XRP",
    date: "2024-08-25",
    amount: "1,000 ADA",
    price: "$0.50",
    type: "Sell",
    totaldefaultValue: "$250",
  },
  {
    img: "/images/solana-2.png",
    coin: "Solana",
    symbol: "SOL",
    date: "2024-08-20",
    amount: "0.40 BTC",
    price: "$35",
    type: "Sell",
    totaldefaultValue: "$11,800",
  },
  {
    img: "/images/usdc.png",
    coin: "USDC",
    symbol: "USDC",
    date: "2024-08-15",
    amount: "3.00 USDC",
    price: "$0.9999",
    type: "Buy",
    totaldefaultValue: "$5,400",
  },
  {
    img: "/images/dogecoin.png",
    coin: "Dogecoin",
    symbol: "DOGE",
    date: "2024-08-14",
    amount: "3.00 DOGE",
    price: "$0,1221",
    type: "Sell",
    totaldefaultValue: "$254",
  },
  {
    img: "/images/toncoin.png",
    coin: "Toncoin",
    symbol: "TON",
    date: "2024-08-10",
    amount: "3.00 TON",
    price: "$5.82",
    type: "Buy",
    totaldefaultValue: "$1,253",
  },
  {
    img: "/images/cardano.png",
    coin: "Cardano",
    symbol: "ADA",
    date: "2024-08-08",
    amount: "3.00 ADA",
    price: "$0,3884",
    type: "Buy",
    totaldefaultValue: "$4,432",
  },
  {
    img: "/images/tron.png",
    coin: "TRON",
    symbol: "TRX",
    date: "2024-08-07",
    amount: "10.00 TRX",
    price: "$0.1554",
    type: "Sell",
    totaldefaultValue: "$5,435",
  },
  {
    img: "/images/avalanche.png",
    coin: "Avalanche",
    symbol: "AVAX",
    date: "2024-08-02",
    amount: "43.22 AVAX",
    price: "$28.77",
    type: "Sell",
    totaldefaultValue: "$134",
  },
  {
    img: "/images/shiba-inu.png",
    coin: "Shiba Inu",
    symbol: "SHIB",
    date: "2024-07-25",
    amount: "43.23 SHIB",
    price: "$0.1554",
    type: "Sell",
    totaldefaultValue: "$4,342",
  },
  {
    img: "/images/chainlink.png",
    coin: "Chainlink",
    symbol: "LINK",
    date: "2024-08-01",
    amount: "54.23 LINK",
    price: "$28.77",
    type: "Sell",
    totaldefaultValue: "$5,302",
  },
];

const ITEMS_PER_PAGE = 7;

const TransactionHistory = () => {
  const [currentPage, setCurrentPage] = useState(1);

  // Calculate the transactions to display based on the current page
  const indexOfLastItem = currentPage * ITEMS_PER_PAGE;
  const indexOfFirstItem = indexOfLastItem - ITEMS_PER_PAGE;
  const currentTransactions = transactionsData.slice(
    indexOfFirstItem,
    indexOfLastItem
  );

  const totalPages = Math.ceil(transactionsData.length / ITEMS_PER_PAGE);

  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-3">
            <h3 className="mb-0">Transaction History</h3>
            <Form.Select className="month-select form-control p-0 h-auto border-0 pe-4 w-auto">
              <option defaultValue="0">July 01 - July 31, 2024</option>
              <option defaultValue="1">August 01 - August 31, 2024</option>
              <option defaultValue="2">September 01 - September 31, 2024</option>
            </Form.Select>
          </div>

          <div className="default-table-area style-two transaction-table">
            <div className="table-responsive">
              <Table className="table align-middle border-0 crypto-th-table">
                <thead>
                  <tr className="border-bottom">
                    <th scope="col" className="bg-transparent">
                      Coin
                    </th>
                    <th scope="col" className="text-end bg-transparent">
                      Date
                    </th>
                    <th scope="col" className="text-end bg-transparent">
                      Amount
                    </th>
                    <th scope="col" className="text-end bg-transparent">
                      Price
                    </th>
                    <th scope="col" className="text-end bg-transparent">
                      Type
                    </th>
                    <th scope="col" className="text-end bg-transparent pe-0">
                      Total defaultValue
                    </th>
                  </tr>
                </thead>

                <tbody>
                  {currentTransactions.map((transaction, index) => (
                    <tr key={index}>
                      <td className="text-end fw-medium ps-0">
                        <div className="d-flex">
                          <Image
                            src={transaction.img}
                            className="rounded-circle"
                            alt={transaction.coin}
                            width={22}
                            height={22}
                          />
                          <span className="ps-2 fw-medium">
                            {transaction.coin}{" "}
                            <span className="text-body">
                              ({transaction.symbol})
                            </span>
                          </span>
                        </div>
                      </td>
                      <td className="text-end fw-medium">{transaction.date}</td>
                      <td className="text-end fw-medium">
                        {transaction.amount}
                      </td>
                      <td className="text-end fw-medium">
                        {transaction.price}
                      </td>
                      <td className="text-end">
                        <span
                          className={`d-inline-block text-capitalize py-1 px-2 rounded-2 ${
                            transaction.type === "Buy"
                              ? "bg-success bg-opacity-10 text-success"
                              : "bg-danger bg-opacity-10 text-danger"
                          }`}
                        >
                          {transaction.type}
                        </span>
                      </td>
                      <td className="text-end fw-medium pe-0">
                        {transaction.totaldefaultValue}
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
              <span className="fs-12 fw-medium">
                Showing {currentTransactions.length} of{" "}
                {transactionsData.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li
                    className={`page-item ${
                      currentPage === 1 ? "disabled" : ""
                    }`}
                  >
                    <Button
                      type="button"
                      className="page-link icon"
                      aria-label="Previous"
                      onClick={() => handlePageChange(currentPage - 1)}
                    >
                      <span className="material-symbols-outlined">
	keyboard_arrow_left
</span>
                    </Button>
                  </li>
                  {[...Array(totalPages)].map((_, index) => (
                    <li key={index} className="page-item">
                      <Button
                        type="button"
                        className={`page-link ${
                          index + 1 === currentPage ? "active" : ""
                        }`}
                        onClick={() => handlePageChange(index + 1)}
                      >
                        {index + 1}
                      </Button>
                    </li>
                  ))}
                  <li
                    className={`page-item ${
                      currentPage === totalPages ? "disabled" : ""
                    }`}
                  >
                    <Button
                      type="button"
                      className="page-link icon"
                      onClick={() => handlePageChange(currentPage + 1)}
                    >
                      <span className="material-symbols-outlined">
	keyboard_arrow_right
</span>
                    </Button>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TransactionHistory;
