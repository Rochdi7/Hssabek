"use client";

import Image from "next/image";
import Link from "next/link";
import { Table, Form, Card, Button } from "react-bootstrap";
import { useState, useEffect } from "react";

const mockSellerData = [
  {
    id: 1,
    name: "Christmas Eve",
    location: "Queensland",
    deliveries: 6240,
    earnings: "624 ETH",
    rating: 5.0,
    userImage: "/images/user-81.png",
  },
  {
    id: 2,
    name: "Skyler White",
    location: "Neverdies",
    deliveries: 5135,
    earnings: "597 ETH",
    rating: 4.9,
    userImage: "/images/user-80.png",
  },
  {
    id: 3,
    name: "Jonathon Watson",
    location: "Emoticons",
    deliveries: 4321,
    earnings: "413 ETH",
    rating: 4.8,
    userImage: "/images/user-82.png",
  },
  {
    id: 4,
    name: "Walter White",
    location: "Puzzleworld",
    deliveries: 3124,
    earnings: "321 ETH",
    rating: 4.0,
    userImage: "/images/user-83.png",
  },
  {
    id: 5,
    name: "David Carlen",
    location: "Liveslong",
    deliveries: 2137,
    earnings: "246 ETH",
    rating: 4.5,
    userImage: "/images/user-84.png",
  },
  {
    id: 6,
    name: "Oliver Jake",
    location: "Neverdies",
    deliveries: 5135,
    earnings: "597 ETH",
    rating: 4.9,
    userImage: "/images/user-85.png",
  },
  {
    id: 7,
    name: "Noah James",
    location: "Puzzleworld",
    deliveries: 3124,
    earnings: "321 ETH",
    rating: 4.0,
    userImage: "/images/user-86.png",
  },
  {
    id: 8,
    name: "Jack Connor",
    location: "Emoticons",
    deliveries: 4321,
    earnings: "413 ETH",
    rating: 4.8,
    userImage: "/images/user-87.png",
  },
  {
    id: 9,
    name: "Jacob Jacob",
    location: "Queensland",
    deliveries: 6240,
    earnings: "624 ETH",
    rating: 5.0,
    userImage: "/images/user-88.png",
  },
  {
    id: 10,
    name: "William Richard",
    location: "Liveslong",
    deliveries: 2137,
    earnings: "246 ETH",
    rating: 4.5,
    userImage: "/images/user-89.png",
  },
];

const ITEMS_PER_PAGE = 5;

const MostPopularSellers = () => {
  const [sellers, setSellers] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);

  useEffect(() => {
    setSellers(mockSellerData);
  }, []);

  const totalPages = Math.ceil(sellers.length / ITEMS_PER_PAGE);

  const displayedSellers = sellers.slice(
    (currentPage - 1) * ITEMS_PER_PAGE,
    currentPage * ITEMS_PER_PAGE
  );

  const handlePrevious = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  const handleNext = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
          <h3 className="mb-0">Most Popular Sellers</h3>
          <Form.Select className="month-select form-control w-135 bg-border-color border-color">
            <option value="0">Monthly</option>
            <option value="1">Yearly</option>
          </Form.Select>
        </div>

        <div className="default-table-area style-two campaigns-table">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <thead>
                <tr className="border-bottom">
                  <th className="bg-transparent text-body fw-medium">
                    SELLERS
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    DELIVERIES
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    EARNINGS
                  </th>
                  <th className="bg-transparent text-body fw-medium">
                    RATINGS
                  </th>
                  <th className="text-end bg-transparent text-body fw-medium">
                    VIEW
                  </th>
                </tr>
              </thead>
              <tbody>
                {displayedSellers.map((seller) => (
                  <tr key={seller.id}>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src={seller.userImage}
                          alt={seller.name}
                          width={40}
                          height={40}
                          className="rounded-circle"
                        />
                        <div className="ms-2">
                          <h4 className="fs-14 fw-semibold mb-1">
                            {seller.name}
                          </h4>
                          <span className="fs-12">{seller.location}</span>
                        </div>
                      </div>
                    </td>
                    <td className="fs-12 fw-semibold text-body">
                      {seller.deliveries}
                    </td>
                    <td className="fs-12 fw-semibold text-body">
                      {seller.earnings}
                    </td>
                    <td>
                      <div className="d-flex gap-1">
                        {[...Array(Math.floor(seller.rating))].map((_, i) => (
                          <i key={i} className="ri-star-fill text-warning"></i>
                        ))}
                        {seller.rating % 1 !== 0 && (
                          <i className="ri-star-half-fill text-warning"></i>
                        )}
                        <span className="text-body">{seller.rating}</span>
                      </div>
                    </td>
                    <td className="text-end">
                      <Link
                        href="/creator-details"
                        className="rounded-circle d-inline-block text-center fs-18 hover-bg"
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

          <div className="d-flex justify-content-between align-items-center text-center flex-wrap gap-2 mt-4">
            <span className="fs-12 fw-medium">
              Showing {displayedSellers.length} of {sellers.length} Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Button
                    className="page-link icon"
                    onClick={handlePrevious}
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
                    onClick={handleNext}
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

export default MostPopularSellers;
