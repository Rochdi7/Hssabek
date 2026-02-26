"use client";

import { useState } from "react";
import { Dropdown, Card, Table, Button } from "react-bootstrap";
import Image from "next/image";

const initialInstructors = [
  {
    image: "/images/user-13.jpg",
    name: "Olivia Clark",
    designation: "Big Data",
    courses: 55,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
    ],
  },
  {
    image: "/images/user-16.jpg",
    name: "Ava Turner",
    designation: "UX/UI",
    courses: 120,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-half-fill",
    ],
  },
  {
    image: "/images/user-17.jpg",
    name: "Lucas Morgan",
    designation: "Developer",
    courses: 86,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-line",
    ],
  },
  {
    image: "/images/user-18.jpg",
    name: "Isabella Cooper",
    designation: "Designer",
    courses: 75,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-half-fill",
    ],
  },
  {
    image: "/images/user-19.jpg",
    name: "Sophie",
    designation: "Developer",
    courses: 86,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-line",
    ],
  },
  {
    image: "/images/user-20.jpg",
    name: "Murphy",
    designation: "Designer",
    courses: 75,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-half-fill",
    ],
  },
  {
    image: "/images/user-21.jpg",
    name: "Smith",
    designation: "Big Data",
    courses: 55,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
    ],
  },
  {
    image: "/images/user-22.jpg",
    name: "Roberts",
    designation: "UX/UI",
    courses: 120,
    ratings: [
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-fill",
      "ri-star-half-fill",
    ],
  },
];

const TopInstructors = () => {
  const [instructors] = useState(initialInstructors);
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 4;

  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = startIndex + itemsPerPage;
  const currentInstructors = instructors.slice(startIndex, endIndex);

  const totalPages = Math.ceil(instructors.length / itemsPerPage);

  const handleNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  const handlePrevPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-0">
        <div className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h3 className="mb-0">Top Instructors</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined">more_horiz</span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">All Time</Dropdown.Item>
                <Dropdown.Item href="#">View</Dropdown.Item>
                <Dropdown.Item href="#">Delete</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>
        </div>

        <div className="default-table-area style-two top-instructors">
          <div className="table-responsive">
            <Table className="table align-middle border-0">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Courses</th>
                  <th scope="col">Ratings</th>
                </tr>
              </thead>
              <tbody>
                {currentInstructors.map((instructor, i) => (
                  <tr key={i}>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src={instructor.image}
                          className="wh-44 rounded-circle"
                          alt="user"
                          width={44}
                          height={44}
                        />
                        <div className="ms-2">
                          <h6 className="mb-0 fs-14 fw-medium">
                            {instructor.name}
                          </h6>
                          <span className="fs-12 text-body">
                            {instructor.designation}
                          </span>
                        </div>
                      </div>
                    </td>
                    <td>{instructor.courses}</td>
                    <td>
                      <ul className="ps-0 mb-0 list-unstyled d-flex gap-1">
                        {instructor.ratings.map((star, j) => (
                          <li key={j}>
                            <i
                              className={`text-rating-color fs-16 ${star}`}
                            ></i>
                          </li>
                        ))}
                      </ul>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>
        </div>

        <div className="p-4 d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2">
          <span className="fs-12 fw-medium">
            Items per page: {itemsPerPage}
          </span>
          <div className="d-flex align-items-center">
            <span className="fs-12 fw-medium me-2">
              {startIndex + 1} - {Math.min(endIndex, instructors.length)} of{" "}
              {instructors.length}
            </span>
            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0">
                <li className="page-item">
                  <Button
                    onClick={handlePrevPage}
                    disabled={currentPage === 1}
                    className="page-link icon"
                  >
                    <span className="material-symbols-outlined">
                      keyboard_arrow_left
                    </span>
                  </Button>
                </li>
                <li className="page-item">
                  <Button
                    onClick={handleNextPage}
                    disabled={currentPage === totalPages}
                    className="page-link icon"
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

export default TopInstructors;
