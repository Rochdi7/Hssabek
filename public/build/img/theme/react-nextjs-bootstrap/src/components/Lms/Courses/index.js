"use client";

import { Card, Form, Table } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";
import Pagination from "./Pagination";

const courseData = [
  {
    id: "#854",
    courseName: "Cybersecurity Awareness",
    detailsLink: "/lms/courses/details/",
    category: "Technology",
    instructorImg: "/images/user-6.jpg",
    instructorName: "Oliver Khan",
    enrolled: 180,
    startDate: "25 Mar 2024",
    endDate: "25 Apr 2024",
    price: "$49.99",
  },
  {
    id: "#853",
    courseName: "Python Programming",
    detailsLink: "/lms/courses/details/",
    category: "Science",
    instructorImg: "/images/user-7.jpg",
    instructorName: "Ava Cooper",
    enrolled: 250,
    startDate: "20 Mar 2024",
    endDate: "20 Apr 2024",
    price: "$45.32",
  },
  {
    id: "#852",
    courseName: "Big Data Analytics",
    detailsLink: "/lms/courses/details/",
    category: "Health & Wellness",
    instructorImg: "/images/user-8.jpg",
    instructorName: "Isabella Evans",
    enrolled: 320,
    startDate: "15 Mar 2024",
    endDate: "15 Apr 2024",
    price: "$99.00",
  },
  {
    id: "#851",
    courseName: "Introduction to Blockchain",
    detailsLink: "/lms/courses/details/",
    category: "Education",
    instructorImg: "/images/user-9.jpg",
    instructorName: "Mia Hughes",
    enrolled: 135,
    startDate: "10 Mar 2024",
    endDate: "10 Apr 2024",
    price: "$29.75",
  },
  {
    id: "#850",
    courseName: "Network Administration",
    detailsLink: "/lms/courses/details/",
    category: "Food & Cooking",
    instructorImg: "/images/user-10.jpg",
    instructorName: "Noah Mitchell",
    enrolled: 460,
    startDate: "05 Mar 2024",
    endDate: "05 Apr 2024",
    price: "$56.99",
  },
  {
    id: "#849",
    courseName: "Artificial Intelligence",
    detailsLink: "/lms/courses/details/",
    category: "Lifestyle & Fashion",
    instructorImg: "/images/user-11.jpg",
    instructorName: "Oliver Khan",
    enrolled: 515,
    startDate: "10 Feb 2024",
    endDate: "10 Mar 2024",
    price: "$78.75",
  },
  {
    id: "#849",
    courseName: "Artificial Intelligence",
    detailsLink: "/lms/courses/details/",
    category: "Lifestyle & Fashion",
    instructorImg: "/images/user-11.jpg",
    instructorName: "Oliver Khan",
    enrolled: 515,
    startDate: "10 Feb 2024",
    endDate: "10 Mar 2024",
    price: "$78.75",
  },
  {
    id: "#850",
    courseName: "Network Administration",
    detailsLink: "/lms/courses/details/",
    category: "Food & Cooking",
    instructorImg: "/images/user-10.jpg",
    instructorName: "Noah Mitchell",
    enrolled: 460,
    startDate: "05 Mar 2024",
    endDate: "05 Apr 2024",
    price: "$56.99",
  },
  {
    id: "#852",
    courseName: "Business Finance",
    detailsLink: "/lms/courses/details/",
    category: "Health & Wellness",
    instructorImg: "/images/user-8.jpg",
    instructorName: "Isabella Evans",
    enrolled: 320,
    startDate: "15 Mar 2024",
    endDate: "15 Apr 2024",
    price: "$99.00",
  },
  {
    id: "#851",
    courseName: "Photoshop Mastery",
    detailsLink: "/lms/courses/details/",
    category: "Education",
    instructorImg: "/images/user-9.jpg",
    instructorName: "Mia Hughes",
    enrolled: 135,
    startDate: "10 Mar 2024",
    endDate: "10 Apr 2024",
    price: "$29.75",
  },
];

const Courses = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <h3 className="mb-0">Courses</h3>

              <Form.Select
                className="month-select form-control p-0 h-auto border-0"
                aria-label="Default select example"
              >
                <option value="0">All Courses</option>
                <option value="1">Paid</option>
                <option value="2">Free</option>
                <option value="3">Top Rated</option>
                <option value="4">Best Seller</option>
              </Form.Select>
            </div>
          </div>

          <div className="default-table-area style-two all-projects">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Enrolled</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {courseData &&
                    courseData.slice(0, 10).map((value, i) => (
                      <tr key={i}>
                        <td className="text-body">{value.id}</td>

                        <td>
                          <Link href={value.detailsLink}>
                            {value.courseName}
                          </Link>
                        </td>

                        <td>{value.category}</td>

                        <td>
                          <div className="d-flex align-items-center">
                            <div className="flex-shrink-0">
                              <Image
                                src={value.instructorImg}
                                className="wh-34 rounded-circle"
                                alt="user"
                                width={34}
                                height={34}
                              />
                            </div>
                            <div className="flex-grow-1 ms-2 position-relative top-1">
                              <h6 className="mb-0 fs-14 fw-medium">
                                {value.instructorName}
                              </h6>
                            </div>
                          </div>
                        </td>

                        <td className="text-body">{value.enrolled}</td>

                        <td className="text-body">{value.startDate}</td>

                        <td className="text-body">{value.endDate}</td>

                        <td>{value.price}</td>

                        <td>
                          <div className="d-flex align-items-center gap-1">
                            <Link href={value.detailsLink}>
                              <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                                <span className="material-symbols-outlined fs-16 text-primary">
                                  visibility
                                </span>
                              </button>
                            </Link>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-body">
                                edit
                              </span>
                            </button>

                            <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                              <span className="material-symbols-outlined fs-16 text-danger">
                                delete
                              </span>
                            </button>
                          </div>
                        </td>
                      </tr>
                    ))}
                </tbody>
              </Table>
            </div>

            {/* Pagination */}
            <Pagination />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Courses;
