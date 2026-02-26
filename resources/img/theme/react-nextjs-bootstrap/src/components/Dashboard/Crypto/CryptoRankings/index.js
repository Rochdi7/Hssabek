"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Image from "next/image";

const cryptoData = [
  {
    rank: 1,
    img: "/images/cardano.png",
    name: "Bitcoin",
    symbol: "BTC",
    marketCap: "$520B",
    price: "$27,500",
    change24h: "+2.3%",
    change7d: "+10.2%",
    defaultValue24h: "$35B",
    supply: "19M BTC",
  },
  {
    rank: 2,
    img: "/images/ethereum-2.png",
    name: "Ethereum",
    symbol: "ETH",
    marketCap: "$210B",
    price: "$1,750",
    change24h: "-1.2%",
    change7d: "+6.3%",
    defaultValue24h: "$20B",
    supply: "120M ETH",
  },
  {
    rank: 3,
    img: "/images/binance-2.png",
    name: "Binance",
    symbol: "BNB",
    marketCap: "$40B",
    price: "$250",
    change24h: "+1.5%",
    change7d: "+7.8%",
    defaultValue24h: "$1.8B",
    supply: "160M BNB",
  },
  {
    rank: 4,
    img: "/images/tether.png",
    name: "Tether",
    symbol: "USDT",
    marketCap: "$83B",
    price: "$1.00",
    change24h: "+0.01%",
    change7d: "+0.02%",
    defaultValue24h: "$45B",
    supply: "83B USDT",
  },
  {
    rank: 5,
    img: "/images/xrp.png",
    name: "XRP",
    symbol: "XRP",
    marketCap: "$25B",
    price: "$0.50",
    change24h: "+0.9%",
    change7d: "-8.6%",
    defaultValue24h: "$2.2B",
    supply: "50B XRP",
  },
  {
    rank: 6,
    img: "/images/solana-2.png",
    name: "Solana",
    symbol: "SOL",
    marketCap: "$12B",
    price: "$35",
    change24h: "+5.8%",
    change7d: "+15.5%",
    defaultValue24h: "$3.5B",
    supply: "400M SOL",
  },
  {
    rank: 7,
    img: "/images/usdc.png",
    name: "USDC",
    symbol: "USDC",
    marketCap: "$36B",
    price: "$0.9999",
    change24h: "+0.01%",
    change7d: "+0.02%",
    defaultValue24h: "$4B",
    supply: "36 USDC",
  },
  {
    rank: 8,
    img: "/images/dogecoin.png",
    name: "Dogecoin",
    symbol: "DOGE",
    marketCap: "$17B",
    price: "$0,1221",
    change24h: "-0.56%",
    change7d: "-3.57%",
    defaultValue24h: "$85B",
    supply: "146M DOGE",
  },
  {
    rank: 9,
    img: "/images/toncoin.png",
    name: "Toncoin",
    symbol: "TON",
    marketCap: "$14B",
    price: "$5.82",
    change24h: "+0.13%",
    change7d: "+0.88%",
    defaultValue24h: "$21B",
    supply: "25M TON",
  },
  {
    rank: 10,
    img: "/images/cardano.png",
    name: "Cardano",
    symbol: "ADA",
    marketCap: "$13B",
    price: "$0,3884",
    change24h: "-0.59%",
    change7d: "-1.80%",
    defaultValue24h: "$32B",
    supply: "86M ADA",
  },
  {
    rank: 11,
    img: "/images/tron.png",
    name: "TRON",
    symbol: "TRX",
    marketCap: "$130B",
    price: "$0.1554",
    change24h: "+0.17%",
    change7d: "+0.02%",
    defaultValue24h: "$33B",
    supply: "86M TRX",
  },
  {
    rank: 12,
    img: "/images/avalanche.png",
    name: "Avalanche",
    symbol: "AVAX",
    marketCap: "$11B",
    price: "$28.77",
    change24h: "-0.08%",
    change7d: "+0.51%",
    defaultValue24h: "$32B",
    supply: "40M AVAX",
  },
];

const CryptoRankings = () => {
  const rowsPerPage = 6;
  const [currentPage, setCurrentPage] = useState(1);

  const totalPages = Math.ceil(cryptoData.length / rowsPerPage);
  const currentData = cryptoData.slice(
    (currentPage - 1) * rowsPerPage,
    currentPage * rowsPerPage
  );

  const handlePreviousPage = () =>
    setCurrentPage((prev) => Math.max(prev - 1, 1));
  const handleNextPage = () =>
    setCurrentPage((prev) => Math.min(prev + 1, totalPages));

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-3">
          <h3 className="mb-0">Crypto Rankings</h3>
          <Form.Select className="month-select form-control p-0 h-auto border-0 pe-4 w-auto">
            <option defaultValue="0">July 01 - July 31, 2024</option>
            <option defaultValue="1">August 01 - August 31, 2024</option>
            <option defaultValue="2">September 01 - September 31, 2024</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-two rankings-table">
          <div className="table-responsive">
            <Table className="align-middle border-0 crypto-cr-table">
              <thead>
                <tr className="border-bottom">
                  <th className="bg-transparent">Rank</th>
                  <th className="bg-transparent">Cryptocurrency</th>
                  <th className="bg-transparent text-end">Market Cap</th>
                  <th className="bg-transparent text-end">Price</th>
                  <th className="bg-transparent text-end">24h Change %</th>
                  <th className="bg-transparent text-end">7d Change %</th>
                  <th className="bg-transparent text-end">defaultValue 24h</th>
                  <th className="bg-transparent text-end">
                    Circulating Supply
                  </th>
                </tr>
              </thead>
              <tbody>
                {currentData.map((crypto) => (
                  <tr key={crypto.rank}>
                    <td className="fw-medium">{crypto.rank}</td>
                    <td className="text-end fw-medium ps-0">
                      <div className="d-flex align-items-center">
                        <Image
                          src={crypto.img}
                          className="rounded-circle"
                          alt={crypto.name}
                          width={22}
                          height={22}
                        />
                        <span className="ps-2 fw-medium">
                          {crypto.name}{" "}
                          <span className="text-body">({crypto.symbol})</span>
                        </span>
                      </div>
                    </td>
                    <td className="text-end fw-medium">{crypto.marketCap}</td>
                    <td className="text-end fw-medium">{crypto.price}</td>
                    <td
                      className={`text-end fw-medium ${
                        crypto.change24h.startsWith("-")
                          ? "text-danger"
                          : "text-success"
                      }`}
                    >
                      {crypto.change24h}
                    </td>
                    <td
                      className={`text-end fw-medium ${
                        crypto.change7d.startsWith("-")
                          ? "text-danger"
                          : "text-success"
                      }`}
                    >
                      {crypto.change7d}
                    </td>
                    <td className="text-end fw-medium">
                      {crypto.defaultValue24h}
                    </td>
                    <td className="text-end fw-medium">{crypto.supply}</td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
            <span className="fs-12 fw-medium">
              Showing {currentData.length} of {cryptoData.length} Results
            </span>

            <nav aria-label="Page navigation">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    type="button"
                    className="page-link icon"
                    onClick={handlePreviousPage}
                    disabled={currentPage === 1}
                  >
                    <span className="material-symbols-outlined">
                      keyboard_arrow_left
                    </span>
                  </Button>
                </li>
                {[...Array(totalPages)].map((_, index) => (
                  <li className="page-item" key={index}>
                    <Button
                      type="button"
                      className={`page-link ${
                        currentPage === index + 1 ? "active" : ""
                      }`}
                      onClick={() => setCurrentPage(index + 1)}
                    >
                      {index + 1}
                    </Button>
                  </li>
                ))}
                <li className="page-item">
                  <Button
                    type="button"
                    className="page-link icon"
                    onClick={handleNextPage}
                    disabled={currentPage === totalPages}
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
  );
};

export default CryptoRankings;
