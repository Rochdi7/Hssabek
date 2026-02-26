"use client";

import Image from "next/image";
import Link from "next/link";
import { Table, Form, Card, Button } from "react-bootstrap";
import { useState } from "react";

// Mock data for auctions (replace with data from an API or a state variable)
const auctionData = [
  // Add your mock auction items here
  {
    id: 1,
    itemName: "Christmas Eve",
    creator: "John Lira",
    imageUrl: "/images/nft-5.gif",
    openPrice: "11.75 ETH",
    userOffer: "10.00 ETH",
    recentOffer: { amount: "10.08 ETH", userImage: "/images/user-80.png" },
    timeLeft: "2h : 43m : 21s",
    viewLink: "#",
  },
  {
    id: 2,
    itemName: "Rotating Flower",
    creator: "WalterW",
    imageUrl: "/images/nft-6.gif",
    openPrice: "9.25 ETH",
    userOffer: "6.10 ETH",
    recentOffer: { amount: "7.15 ETH", userImage: "/images/user-81.png" },
    timeLeft: "1h : 21m : 12s",
    viewLink: "#",
  },
  {
    id: 3,
    itemName: "Windows Art",
    creator: "Christino",
    imageUrl: "/images/nft-7.png",
    openPrice: "17.24 ETH",
    userOffer: "11.75 ETH",
    recentOffer: { amount: "14.11 ETH", userImage: "/images/user-82.png" },
    timeLeft: "43m : 21s",
    viewLink: "#",
  },
  {
    id: 4,
    itemName: "3D Logo",
    creator: "Hater",
    imageUrl: "/images/nft-8.png",
    openPrice: "12.12 ETH",
    userOffer: "10.24 ETH",
    recentOffer: { amount: "12.08 ETH", userImage: "/images/user-83.png" },
    timeLeft: "1h : 23m : 17s",
    viewLink: "#",
  },
  {
    id: 5,
    itemName: "Awesome Bird",
    creator: "Liveslong",
    imageUrl: "/images/nft-9.png",
    openPrice: "8.15 ETH",
    userOffer: "7.15 ETH",
    recentOffer: { amount: "8.08 ETH", userImage: "/images/user-84.png" },
    timeLeft: "4h : 14m : 54s",
    viewLink: "#",
  },
  {
    id: 6,
    itemName: "Awesome Bird",
    creator: "Liveslong",
    imageUrl: "/images/nft-9.png",
    openPrice: "8.15 ETH",
    userOffer: "7.15 ETH",
    recentOffer: { amount: "8.08 ETH", userImage: "/images/user-84.png" },
    timeLeft: "4h : 14m : 54s",
    viewLink: "#",
  },
  {
    id: 7,
    itemName: "Christmas Eve",
    creator: "John Lira",
    imageUrl: "/images/nft-5.gif",
    openPrice: "11.75 ETH",
    userOffer: "10.00 ETH",
    recentOffer: { amount: "10.08 ETH", userImage: "/images/user-80.png" },
    timeLeft: "2h : 43m : 21s",
    viewLink: "#",
  },
  {
    id: 8,
    itemName: "Windows Art",
    creator: "Christino",
    imageUrl: "/images/nft-7.png",
    openPrice: "17.24 ETH",
    userOffer: "11.75 ETH",
    recentOffer: { amount: "14.11 ETH", userImage: "/images/user-82.png" },
    timeLeft: "43m : 21s",
    viewLink: "#",
  },
  {
    id: 9,
    itemName: "Rotating Flower",
    creator: "WalterW",
    imageUrl: "/images/nft-6.gif",
    openPrice: "9.25 ETH",
    userOffer: "6.10 ETH",
    recentOffer: { amount: "7.15 ETH", userImage: "/images/user-81.png" },
    timeLeft: "1h : 21m : 12s",
    viewLink: "#",
  },
  {
    id: 10,
    itemName: "3D Logo",
    creator: "Hater",
    imageUrl: "/images/nft-8.png",
    openPrice: "12.12 ETH",
    userOffer: "10.24 ETH",
    recentOffer: { amount: "12.08 ETH", userImage: "/images/user-83.png" },
    timeLeft: "1h : 23m : 17s",
    viewLink: "#",
  },
];

const ITEMS_PER_PAGE = 5;

const ActiveAuctions = () => {
  const [currentPage, setCurrentPage] = useState(1);

  // Calculate the data to be displayed on the current page
  const indexOfLastItem = currentPage * ITEMS_PER_PAGE;
  const indexOfFirstItem = indexOfLastItem - ITEMS_PER_PAGE;
  const currentItems = auctionData.slice(indexOfFirstItem, indexOfLastItem);
  const totalPages = Math.ceil(auctionData.length / ITEMS_PER_PAGE);

  const handlePrevPage = () => setCurrentPage((prev) => Math.max(prev - 1, 1));
  const handleNextPage = () =>
    setCurrentPage((prev) => Math.min(prev + 1, totalPages));

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <h3 className="mb-0">Active Auctions</h3>

            <Form.Select
              className="month-select form-control w-135 bg-border-color border-color"
              aria-label="Default select example"
            >
              <option value="0">Monthly</option>
              <option value="1">Yearly</option>
            </Form.Select>
          </div>

          <div className="default-table-area style-two campaigns-table">
            <div className="table-responsive">
              <Table className="align-middle border-0">
                <thead>
                  <tr className="border-bottom">
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      ITEM
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      OPEN PRICE
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      YOUR OFFER
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      RECENT OFFER
                    </th>
                    <th
                      scope="col"
                      className="bg-transparent text-body fw-medium"
                    >
                      TIME LEFT
                    </th>
                    <th
                      scope="col"
                      className="text-end bg-transparent text-body fw-medium"
                    >
                      VIEW
                    </th>
                  </tr>
                </thead>

                <tbody>
                  {currentItems.map((auction) => (
                    <tr key={auction.id}>
                      <td>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={auction.imageUrl}
                              className="rounded-3"
                              alt="nft"
                              width={50}
                              height={50}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2">
                            <h4 className="fs-14 fw-semibold mb-1">
                              {auction.itemName}
                            </h4>
                            <span className="fs-12">by {auction.creator}</span>
                          </div>
                        </div>
                      </td>

                      <td className="fs-12 fw-semibold text-body">
                        {auction.openPrice}
                      </td>

                      <td className="fs-12 fw-semibold text-body">
                        {auction.userOffer}
                      </td>

                      <td>
                        <div className="d-flex align-items-center">
                          <Image
                            src={auction.recentOffer.userImage}
                            className="border border-1 box-shadow border-color-white rounded-circle"
                            alt="user"
                            width={22}
                            height={22}
                          />
                          <span className="text-body fs-12 fw-semibold ms-2">
                            {auction.recentOffer.amount}
                          </span>
                        </div>
                      </td>

                      <td className="fs-12 fw-semibold text-body">
                        {auction.timeLeft}
                      </td>

                      <td className="text-end">
                        <Link
                          href={auction.viewLink}
                          className="rounded-circle d-inline-block text-center fs-18 hover-bg for-dark-read"
                          style={{
                            backgroundColor: "#ECEEF2",
                            width: "30px",
                            height: "30px",
                            lineHeight: "30px",
                          }}
                        >
                          <i className="ri-arrow-right-line"></i>
                        </Link>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
              <span className="fs-12 fw-medium">
                Showing {currentItems.length} of {auctionData.length} Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button
                      onClick={handlePrevPage}
                      className={`page-link icon ${
                        currentPage === 1 && "disabled"
                      }`}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  
                  <li className="page-item">
                    <Button
                      onClick={handleNextPage}
                      className={`page-link icon ${
                        currentPage === totalPages && "disabled"
                      }`}
                    >
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
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

export default ActiveAuctions;
