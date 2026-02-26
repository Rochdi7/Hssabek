"use client";

import Image from "next/image";
import { Table, Form, Card, Button } from "react-bootstrap";
import { useState } from "react";

const TopNfts = () => {
  // NFT data
  const [nftData] = useState([
    {
      id: 1,
      name: "Christmas Eve",
      location: "Queensland",
      volume: 6240,
      flowPrice: "624 ETH",
      status: "+5.4%",
      statusType: "success",
      imageUrl: "/images/sellers-1.gif",
    },
    {
      id: 2,
      name: "Walking Brain",
      location: "@neverdies",
      volume: 5135,
      flowPrice: "597 ETH",
      status: "-3.2%",
      statusType: "danger",
      imageUrl: "/images/sellers-2.gif",
    },
    {
      id: 3,
      name: "Flying Flower",
      location: "@emoticons",
      volume: 4321,
      flowPrice: "413 ETH",
      status: "+2.5%",
      statusType: "success",
      imageUrl: "/images/sellers-3.gif",
    },
    {
      id: 4,
      name: "Living Robot",
      location: "@puzzleworld",
      volume: 3124,
      flowPrice: "321 ETH",
      status: "-1.5%",
      statusType: "danger",
      imageUrl: "/images/sellers-4.gif",
    },
    {
      id: 5,
      name: "Thumbs Up",
      location: "@liveslong",
      volume: 2137,
      flowPrice: "246 ETH",
      status: "+5.4%",
      statusType: "success",
      imageUrl: "/images/sellers-5.gif",
    },
    {
      id: 6,
      name: "Super Star",
      location: "California",
      volume: 1530,
      flowPrice: "123 ETH",
      status: "+1.9%",
      statusType: "success",
      imageUrl: "/images/sellers-1.gif",
    },
    {
      id: 7,
      name: "Flying Flower",
      location: "@emoticons",
      volume: 4321,
      flowPrice: "413 ETH",
      status: "+2.5%",
      statusType: "success",
      imageUrl: "/images/sellers-3.gif",
    },
    {
      id: 8,
      name: "Walking Brain",
      location: "@neverdies",
      volume: 5135,
      flowPrice: "597 ETH",
      status: "-3.2%",
      statusType: "danger",
      imageUrl: "/images/sellers-2.gif",
    },
    {
      id: 9,
      name: "Living Robot",
      location: "@puzzleworld",
      volume: 3124,
      flowPrice: "321 ETH",
      status: "-1.5%",
      statusType: "danger",
      imageUrl: "/images/sellers-4.gif",
    },
    {
      id: 10,
      name: "Thumbs Up",
      location: "@liveslong",
      volume: 2137,
      flowPrice: "246 ETH",
      status: "+5.4%",
      statusType: "success",
      imageUrl: "/images/sellers-5.gif",
    },
    // Additional data as needed
  ]);

  // Pagination state
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 5;

  // Calculate total pages
  const totalPages = Math.ceil(nftData.length / itemsPerPage);

  // Paginate data
  const paginatedData = nftData.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  // Page change handlers
  const handlePreviousPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  const handleNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
          <h3 className="mb-0">Top NFTs</h3>
          <Form.Select
            className="month-select form-control w-135 bg-border-color border-color"
            aria-label="Default select example"
          >
            <option value="0">Monthly</option>
            <option value="1">Yearly</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-two top-nfts-table">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead>
                <tr className="border-bottom">
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-12">SELLERS</span>
                  </th>
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-12">VOLUME</span>
                  </th>
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-12">FLOW PRICE</span>
                  </th>
                  <th
                    scope="col"
                    className="text-end bg-transparent text-body fw-medium"
                  >
                    <span className="fs-12">STATUS</span>
                  </th>
                </tr>
              </thead>
              <tbody>
                {paginatedData.map((nft) => (
                  <tr key={nft.id}>
                    <td>
                      <div className="d-flex align-items-center">
                        <div className="flex-shrink-0">
                          <Image
                            src={nft.imageUrl}
                            className="rounded-circle"
                            alt="nft"
                            width={40}
                            height={40}
                          />
                        </div>
                        <div className="flex-grow-1 ms-2">
                          <h4 className="fs-14 fw-semibold mb-1">{nft.name}</h4>
                          <span className="fs-12">{nft.location}</span>
                        </div>
                      </div>
                    </td>
                    <td className="fs-12 fw-semibold text-body">
                      {nft.volume}
                    </td>
                    <td className="fs-12 fw-semibold text-body">
                      {nft.flowPrice}
                    </td>
                    <td className="text-end">
                      <span
                        className={`bg-${nft.statusType} text-${nft.statusType} py-1 px-3 border border-${nft.statusType} rounded-pill bg-opacity-10 fs-12`}
                      >
                        {nft.status}
                      </span>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
            <span className="fs-12 fw-medium">
              Showing {paginatedData.length} of {nftData.length} Results
            </span>
            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={handlePreviousPage}
                    disabled={currentPage === 1}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </Button>
                </li>
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={handleNextPage}
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
      </Card.Body>
    </Card>
  );
};

export default TopNfts;
