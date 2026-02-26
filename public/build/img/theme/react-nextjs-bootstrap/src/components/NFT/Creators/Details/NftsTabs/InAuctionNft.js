"use client";

import { useState } from "react";
import { Table, Button } from "react-bootstrap";
import Image from "next/image";

const InAuctionNft = () => {
  // NFT data array
  const [nfts] = useState([
    {
      id: 1,
      image: "/images/nft-3.gif",
      title: "Windows Art",
      creator: "Christino",
      price: "17.24 ETH",
      bid: "11.75 ETH",
      time: "1.30 hr ago",
    },
    {
      id: 2,
      image: "/images/nft-4.gif",
      title: "Awesome Bird",
      creator: "John Lira",
      price: "12.12 ETH",
      bid: "10.24 ETH",
      time: "35 mins ago",
    },
    {
      id: 3,
      image: "/images/nft-5.gif",
      title: "Christmas Eve",
      creator: "John Lira",
      price: "11.75 ETH",
      bid: "10.00 ETH",
      time: "30 mins ago",
    },
    {
      id: 4,
      image: "/images/nft-1.gif",
      title: "Christmas Eve",
      creator: "John Lira",
      price: "11.75 ETH",
      bid: "10.00 ETH",
      time: "30 mins ago",
    },
    {
      id: 5,
      image: "/images/nft-2.png",
      title: "Rotating Flower",
      creator: "WalterW.",
      price: "9.25 ETH",
      bid: "6.10 ETH",
      time: "1 hr ago",
    },
  ]);

  // Pagination
  const itemsPerPage = 10;
  const [currentPage, setCurrentPage] = useState(1);

  // Calculate paginated data
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentItems = nfts.slice(indexOfFirstItem, indexOfLastItem);

  // Handle page navigation
  const handleNextPage = () => {
    if (currentPage < Math.ceil(nfts.length / itemsPerPage)) {
      setCurrentPage(currentPage + 1);
    }
  };

  const handlePreviousPage = () => {
    if (currentPage > 1) {
      setCurrentPage(currentPage - 1);
    }
  };

  return (
    <div className="default-table-area style-two campaigns-table only-for-responsive-table">
      <div className="table-responsive">
        <Table className="align-middle border-0 w-100">
          <tbody>
            {currentItems.map((nft) => (
              <tr key={nft.id}>
                <td>
                  <div className="d-flex align-items-center">
                    <div className="flex-shrink-0">
                      <Image
                        src={nft.image}
                        className="rounded-3"
                        alt={nft.title}
                        width={50}
                        height={50}
                        style={{ height: "50px" }}
                      />
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <h4 className="fs-14 fw-semibold mb-1">{nft.title}</h4>
                      <span className="fs-12">by {nft.creator}</span>
                    </div>
                  </div>
                </td>
                <td className="fs-12 fw-semibold text-body">{nft.price}</td>
                <td className="fs-12 fw-semibold text-body">{nft.bid}</td>
                <td className="fs-12 fw-semibold text-body">{nft.time}</td>
              </tr>
            ))}
          </tbody>
        </Table>
      </div>

      <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-3">
        <span className="fs-12 fw-medium">
          Showing {Math.min(indexOfLastItem, nfts.length)} of {nfts.length}{" "}
          Results
        </span>

        <nav aria-label="Page navigation example">
          <ul className="pagination mb-0 justify-content-center">
            <li className="page-item">
              <Button
                className="page-link icon"
                onClick={handlePreviousPage}
                disabled={currentPage === 1}
              >
                <i className="material-symbols-outlined">keyboard_arrow_left</i>
              </Button>
            </li>
            <li className="page-item">
              <Button
                className="page-link icon"
                onClick={handleNextPage}
                disabled={currentPage >= Math.ceil(nfts.length / itemsPerPage)}
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
  );
};

export default InAuctionNft;
