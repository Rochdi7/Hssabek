"use client";

import React, { useEffect, useState } from "react";
import { Card, Table, Dropdown } from "react-bootstrap";
import Image from "next/image";

const CustomerRatings = () => {
  const [ratings, setRatings] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 3;

  useEffect(() => {
    // Simulate API call
    const mockRatings = [
      {
        id: 1,
        userId: "#001",
        customerName: "Joanna Watson",
        image: "/images/user-80.png",
        rating: 5.0,
        reviewTitle: "Amazing Ambiance and Delicious Food!",
        review:
          "Trezo was a fantastic dining experience. The ambiance is warm and inviting, perfect for a date night or celebration. I ordered the truffle pasta, which was rich and perfectly seasoned. The service was impeccable, and the staff made us feel like family. Highly recommend!",
        date: "13 Nov, 24",
      },
      {
        id: 2,
        userId: "#002",
        customerName: "Jenelia Anderson",
        image: "/images/user-81.png",
        rating: 4.9,
        reviewTitle: "Best Brunch Spot in Town",
        review:
          "Visited Trezo for brunch with friends, and it exceeded our expectations. The avocado toast was fresh, and their mimosas were spot-on. Our server was attentive without being intrusive. Definitely coming back!",
        date: "14 Nov, 24",
      },
      {
        id: 3,
        userId: "#003",
        customerName: "Jonathon Ronan",
        image: "/images/user-83.png",
        rating: 4.9,
        reviewTitle: "Good Food, Slow Service",
        review:
          "The food at Trezo was delicious, but the service was a bit slow. We had to wait a while for our appetizers, and our main course was delayed. It’s a nice spot, but they could work on speeding up their service.",
        date: "12 Nov, 24",
      },
      {
        id: 4,
        userId: "#004",
        customerName: "Emma Roberts",
        image: "/images/user-84.png",
        rating: 4.8,
        reviewTitle: "Great Place for Family Dinners",
        review:
          "Trezo offers a great atmosphere for family gatherings. The portions were generous, and everyone in our group enjoyed their meal. A bit pricey, but worth it for the quality.",
        date: "15 Nov, 24",
      },
    ];

    setRatings(mockRatings);
  }, []);

  // Pagination logic
  const totalPages = Math.ceil(ratings.length / itemsPerPage);
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentRatings = ratings.slice(indexOfFirstItem, indexOfLastItem);

  const handlePageChange = (newPage) => {
    if (newPage >= 1 && newPage <= totalPages) {
      setCurrentPage(newPage);
    }
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
          <h3 className="mb-0 text-secondary-50">Customer Ratings</h3>

          <Dropdown className="dropdown select-dropdown">
            <Dropdown.Toggle
              variant="secondary"
              id="dropdown-basic"
              className="dropdown-toggle bg-border-color border text-body rounded-2"
            >
              Monthly
            </Dropdown.Toggle>

            <Dropdown.Menu className="bg-white border box-shadow">
              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Weekly
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Monthly
              </Dropdown.Item>

              <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                Yearly
              </Dropdown.Item>
            </Dropdown.Menu>
          </Dropdown>
        </div>

        <div className="default-table-area style-two campaigns-table customer-ratings-table">
          <div className="table-responsive">
            <Table className="border-0">
              <thead>
                <tr className="border-bottom">
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      USER ID
                    </span>
                  </th>
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      CUSTOMER NAME
                    </span>
                  </th>
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      RATINGS
                    </span>
                  </th>
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      REVIEWS
                    </span>
                  </th>
                  <th
                    scope="col"
                    className="bg-transparent text-body fw-medium"
                  >
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      DATE
                    </span>
                  </th>
                  <th
                    scope="col"
                    className="text-end bg-transparent text-body fw-medium"
                  >
                    <span className="fs-10 text-body-color-60 fw-bold letter-spacing-1">
                      ACTION
                    </span>
                  </th>
                </tr>
              </thead>
              <tbody>
                {currentRatings.map((rating) => (
                  <tr key={rating.id}>
                    <td
                      className="fs-12 fw-semibold text-body-color-50 border-border-color-50"
                      style={{ paddingTop: "14px", paddingBottom: "14px" }}
                    >
                      {rating.userId}
                    </td>

                    <td
                      className="border-border-color-50"
                      style={{ paddingTop: "14px", paddingBottom: "14px" }}
                    >
                      <div className="d-flex align-items-center">
                        <div className="flex-shrink-0">
                          <Image
                            src={rating.image}
                            className="rounded-circle"
                            alt="order"
                            width={30}
                            height={30}
                          />
                        </div>
                        <div className="flex-grow-1 ms-2">
                          <h4 className="fs-14 fw-semibold mb-0 text-secondary-50">
                            {rating.customerName}
                          </h4>
                        </div>
                      </div>
                    </td>

                    <td
                      className="border-border-color-50"
                      style={{ paddingTop: "14px", paddingBottom: "14px" }}
                    >
                      <div className="d-flex align-items-center gap-1">
                        <i className="text-danger ri-star-fill"></i>
                        <span className="fs-12 fw-semibold text-body position-relative top-1">
                          {rating.rating}
                        </span>
                      </div>
                    </td>

                    <td
                      className="border-border-color-50"
                      style={{ paddingTop: "14px", paddingBottom: "14px" }}
                    >
                      <h4 className="fs-14 fw-semibold text-body mb-1">
                        {rating.reviewTitle}
                      </h4>
                      <p className="fs-12" style={{ maxWidth: "617px" }}>
                        {rating.review}
                      </p>
                    </td>

                    <td
                      className="fs-12 fw-semibold text-body border-border-color-50"
                      style={{ paddingTop: "14px", paddingBottom: "14px" }}
                    >
                      {rating.date}
                    </td>

                    <td
                      className="text-end border-border-color-50"
                      style={{ paddingTop: "14px", paddingBottom: "14px" }}
                    >
                      <div className="d-flex justify-content-end align-items-center gap-2">
                        <button
                          onClick={() => handleView(rating.id)}
                          className="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                        >
                          <i className="material-symbols-outlined fs-18 text-primary">
                            visibility
                          </i>
                        </button>
                        <button
                          onClick={() => handleEdit(rating.id)}
                          className="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                        >
                          <i className="material-symbols-outlined fs-18 text-primary-div-50">
                            edit
                          </i>
                        </button>
                        <button
                          onClick={() => handleDelete(rating.id)}
                          className="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                        >
                          <i className="material-symbols-outlined fs-18 text-danger">
                            delete
                          </i>
                        </button>
                      </div>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap mt-4">
            <span className="fs-12 fw-medium">
              {" "}
              Showing {indexOfFirstItem + 1} -{" "}
              {Math.min(indexOfLastItem, ratings.length)} of {ratings.length}{" "}
              Results
            </span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <button
                    className={`page-link icon hover-bg ${
                      currentPage === 1 ? "disabled" : ""
                    }`}
                    onClick={() => handlePageChange(currentPage - 1)}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_left
                    </i>
                  </button>
                </li>

                {Array.from({ length: totalPages }, (_, index) => (
                  <li key={index} className="page-item">
                    <button
                      className={`page-link ${
                        currentPage === index + 1 ? "active" : ""
                      }`}
                      onClick={() => handlePageChange(index + 1)}
                    >
                      {index + 1}
                    </button>
                  </li>
                ))}

                <li className="page-item">
                  <button
                    className={`page-link icon hover-bg ${
                      currentPage === totalPages ? "disabled" : ""
                    }`}
                    onClick={() => handlePageChange(currentPage + 1)}
                  >
                    <i className="material-symbols-outlined">
                      keyboard_arrow_right
                    </i>
                  </button>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </Card.Body>
    </Card>
  );
};

export default CustomerRatings;
