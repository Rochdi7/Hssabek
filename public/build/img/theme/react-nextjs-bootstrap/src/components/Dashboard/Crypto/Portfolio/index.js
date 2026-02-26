"use client";

import React, { useState } from "react";
import { Card, Table } from "react-bootstrap";
import Image from "next/image";
import Link from "next/link";

const Portfolio = () => {
  const [portfolioData, setPortfolioData] = useState([
    {
      coin: "Bitcoin",
      symbol: "BTC",
      amount: "0.50 BTC",
      totalValue: "$41,250",
    },
    {
      coin: "Ethereum",
      symbol: "ETH",
      amount: "10.00 ETH",
      totalValue: "$17,500",
    },
    { coin: "Solana", symbol: "SOL", amount: "500 SOL", totalValue: "$17,500" },
    { coin: "Cardano", symbol: "ADA", amount: "2,000 ADA", totalValue: "$500" },
    {
      coin: "Binance",
      symbol: "BNB",
      amount: "5.00 BNB",
      totalValue: "$1,250",
    },
  ]);

  return (
    <>
      <Card className="bg-primary p-4 border-0 position-relative z-0 mb-4">
        <div className="pb-4 mb-3">
          <h3 className="mb-0 text-white">Portfolio</h3>
        </div>

        <div className="d-flex align-items-center mb-4 gap-3">
          <div className="flex-shrink-0">
            <Image
              src="/images/balance.png"
              alt="balance"
              width={40}
              height={40}
            />
          </div>
          <div className="flex-grow-1">
            <span className="mb-1 d-block fw-medium text-white">
              TOTAL BALANCE
            </span>
            <div className="d-flex gap-2">
              <h3 className="mb-0 fs-20 fw-semibold text-white">$78,350.00</h3>
              <div>
                <span className="material-symbols-outlined text-success">
                  trending_up
                </span>
                <span className="text-success">+2.3%</span>
              </div>
            </div>
          </div>
        </div>

        <div className="default-table-area style-two portfolio-table">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead>
                <tr className="border-bottom">
                  <th scope="col" className="text-white bg-transparent">
                    Coin
                  </th>
                  <th
                    scope="col"
                    className="text-white text-end bg-transparent"
                  >
                    Amount
                  </th>
                  <th
                    scope="col"
                    className="text-white text-end bg-transparent pe-0"
                  >
                    Total Value
                  </th>
                </tr>
              </thead>
              <tbody>
                {portfolioData.slice(0, 5).map((item, index) => (
                  <tr key={index}>
                    <td className="fw-medium ps-0 text-white">
                      <span className="fw-medium text-white">
                        {item.coin} <span className="text-white">({item.symbol})</span>
                      </span>
                    </td>
                    <td className="text-end fw-medium text-white">
                      {item.amount}
                    </td>
                    <td className="text-end fw-medium text-white pe-0">
                      {item.totalValue}
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="text-end mt-4">
            <Link
              href="#"
              className="btn btn-outline-primary text-white py-2 px-3"
              style={{ borderColor: "#757DFF" }}
            >
              View All Portfolio
            </Link>
          </div>
        </div>

        {/* Shape Images */}
        <Image
          src="/images/shape-5.png"
          className="position-absolute bottom-0 start-0 z-n1"
          alt="shape"
          width={453}
          height={232}
        />
        <Image
          src="/images/shape-6.png"
          className="position-absolute top-0 end-0 z-n1 pt-4 pe-4 shape-6"
          alt="shape"
          width={130}
          height={107}
        />
      </Card>
    </>
  );
};

export default Portfolio;
