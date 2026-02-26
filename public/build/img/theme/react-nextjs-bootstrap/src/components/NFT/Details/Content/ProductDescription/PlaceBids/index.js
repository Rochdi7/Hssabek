"use client";

import { Table, Button } from "react-bootstrap";
import Image from "next/image";
import { useState } from "react";

const PlaceBids = () => {
  // Define dynamic table data
  const bidsData = [
    {
      id: 1,
      nftImage: "/images/nft-17.png",
      title: "Christmas Eve",
      creator: "John Lira",
      highestBid: "11.75 ETH",
      currentBid: "10.00 ETH",
      timeAgo: "30 mins ago",
    },
    {
      id: 2,
      nftImage: "/images/nft-18.png",
      title: "Rotating Flower",
      creator: "Walter W.",
      highestBid: "9.25 ETH",
      currentBid: "6.10 ETH",
      timeAgo: "1 hr ago",
    },
    {
      id: 3,
      nftImage: "/images/nft-19.png",
      title: "Windows Art",
      creator: "Christino",
      highestBid: "17.24 ETH",
      currentBid: "11.75 ETH",
      timeAgo: "1.30 hr ago",
    },
    {
      id: 4,
      nftImage: "/images/nft-20.png",
      title: "Awesome Bird",
      creator: "John Lira",
      highestBid: "12.12 ETH",
      currentBid: "10.24 ETH",
      timeAgo: "35 mins ago",
    },
    {
      id: 5,
      nftImage: "/images/nft-18.png",
      title: "Rotating Flower",
      creator: "Walter W.",
      highestBid: "9.25 ETH",
      currentBid: "6.10 ETH",
      timeAgo: "1 hr ago",
    },
    {
      id: 6,
      nftImage: "/images/nft-17.png",
      title: "Christmas Eve",
      creator: "John Lira",
      highestBid: "11.75 ETH",
      currentBid: "10.00 ETH",
      timeAgo: "30 mins ago",
    },
  ];

  // Pagination state
  const itemsPerPage = 4; // Number of items to show per page
  const [currentPage, setCurrentPage] = useState(1);

  // Calculate total pages
  const totalPages = Math.ceil(bidsData.length / itemsPerPage);

  // Paginate data
  const paginatedData = bidsData.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  // Handle page change
  const handlePreviousPage = () => {
    setCurrentPage((prevPage) => Math.max(prevPage - 1, 1));
  };

  const handleNextPage = () => {
    setCurrentPage((prevPage) => Math.min(prevPage + 1, totalPages));
  };

  return (
    <>
      <div className="default-table-area style-two campaigns-table only-for-responsive-table mt-2">
        <div className="table-responsive">
          <Table className="table align-middle border-0 w-100">
            <tbody>
              {paginatedData.map((bid) => (
                <tr key={bid.id}>
                  <td>
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0">
                        <Image
                          src={bid.nftImage}
                          className="rounded-3"
                          alt={bid.title}
                          width={50}
                          height={50}
                        />
                      </div>
                      <div className="flex-grow-1 ms-2">
                        <h4 className="fs-14 fw-semibold mb-1">{bid.title}</h4>
                        <span className="fs-12">by {bid.creator}</span>
                      </div>
                    </div>
                  </td>
                  <td className="fs-12 fw-semibold text-body">
                    {bid.highestBid}
                  </td>
                  <td className="fs-12 fw-semibold text-body">
                    {bid.currentBid}
                  </td>
                  <td className="fs-12 fw-semibold text-body">{bid.timeAgo}</td>
                </tr>
              ))}
            </tbody>
          </Table>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-3">
            <span className="fs-12 fw-medium">
              Showing {paginatedData.length} of {bidsData.length} Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    onClick={handlePreviousPage}
                    className="page-link icon"
                    disabled={currentPage === 1}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </Button>
                </li>
                <li className="page-item">
                  <Button
                    onClick={handleNextPage}
                    className="page-link icon"
                    disabled={currentPage === totalPages}
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
      </div>
    </>
  );
};

export default PlaceBids;
