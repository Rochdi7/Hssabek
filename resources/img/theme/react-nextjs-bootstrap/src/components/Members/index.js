"use client";

import React, { useState } from "react";
import { Card, Table } from "react-bootstrap";
import Image from "next/image";

const membersData = [
  {
    id: "#JAN-854",
    member: {
      img: "/images/user-6.jpg",
      name: "Oliver Khan",
    },
    email: "oliver@trezo.com",
    phone: "+1 555-123-4567",
    location: "Washington D.C",
    joiningDate: "10 Oct 2024",
    lastActive: "01 Dec 2024 08:23 AM",
  },
  {
    id: "#JAN-853",
    member: {
      img: "/images/user-7.jpg",
      name: "Carolyn Barnes",
    },
    email: "carolyn@trezo.com",
    phone: "+1 555-987-6543",
    location: "Chicago",
    joiningDate: "11 Sep 2024",
    lastActive: "02 Dec 2024 05:09 PM",
  },
  {
    id: "#JAN-852",
    member: {
      img: "/images/user-8.jpg",
      name: "Donna Miller",
    },
    email: "donna@trezo.com",
    phone: "+1 555-456-7890",
    location: "Oklahoma City",
    joiningDate: "12 Aug 2024",
    lastActive: "03 Dec 2024 09:30 AM",
  },
  {
    id: "#JAN-851",
    member: {
      img: "/images/user-9.jpg",
      name: "Barbara Cross",
    },
    email: "barbara@trezo.com",
    phone: "+1 555-369-7878",
    location: "San Diego",
    joiningDate: "13 Jul 2024",
    lastActive: "04 Dec 2024 10:22 AM",
  },
  {
    id: "#JAN-850",
    member: {
      img: "/images/user-10.jpg",
      name: "Rebecca Block",
    },
    email: "rebecca@trezo.com",
    phone: "+1 555-658-4488",
    location: "Los Angeles",
    joiningDate: "14 Jun 2024",
    lastActive: "05 Dec 2024 08:49 AM",
  },
  {
    id: "#JAN-849",
    member: {
      img: "/images/user-11.jpg",
      name: "Ramiro McCarty",
    },
    email: "ramiro@trezo.com",
    phone: "+1 555-558-9966",
    location: "Las Vegas",
    joiningDate: "15 May 2024",
    lastActive: "06 Dec 2024 04:35 PM",
  },
  {
    id: "#JAN-848",
    member: {
      img: "/images/user-12.jpg",
      name: "Robert Fairweather",
    },
    email: "robert@trezo.com",
    phone: "+1 555-357-5888",
    location: "San Francisco",
    joiningDate: "16 Apr 2024",
    lastActive: "07 Dec 2024 06:13 PM",
  },
  {
    id: "#JAN-847",
    member: {
      img: "/images/user-13.jpg",
      name: "Marcelino Haddock",
    },
    email: "marcelino@trezo.com",
    phone: "+1 555-456-8877",
    location: "Washington D.C",
    joiningDate: "17 Mar 2024",
    lastActive: "08 Dec 2024 02:20 AM",
  },
  {
    id: "#JAN-846",
    member: {
      img: "/images/user-14.jpg",
      name: "Thomas Wilson",
    },
    email: "thomas@trezo.com",
    phone: "+1 555-622-4488",
    location: "San Diego",
    joiningDate: "18 Feb 2024",
    lastActive: "09 Dec 2024 12:09 AM",
  },
  {
    id: "#JAN-845",
    member: {
      img: "/images/user-15.jpg",
      name: "Nathaniel Hulsey",
    },
    email: "nathaniel@trezo.com",
    phone: "+1 555-225-4488",
    location: "Chicago",
    joiningDate: "19 Jan 2024",
    lastActive: "10 Dec 2024 06:03 PM",
  },
  {
    id: "#JAN-844",
    member: {
      img: "/images/user-16.jpg",
      name: "Elena Rodriguez",
    },
    email: "elena@trezo.com",
    phone: "+1 555-789-1234",
    location: "New York",
    joiningDate: "20 Dec 2023",
    lastActive: "11 Dec 2024 07:45 AM",
  },
  {
    id: "#JAN-843",
    member: {
      img: "/images/user-17.jpg",
      name: "Michael Stone",
    },
    email: "michael@trezo.com",
    phone: "+1 555-321-6547",
    location: "Boston",
    joiningDate: "21 Nov 2023",
    lastActive: "12 Dec 2024 03:22 PM",
  },
  {
    id: "#JAN-842",
    member: {
      img: "/images/user-18.jpg",
      name: "Sophia Martinez",
    },
    email: "sophia@trezo.com",
    phone: "+1 555-654-3210",
    location: "Miami",
    joiningDate: "22 Oct 2023",
    lastActive: "13 Dec 2024 11:11 AM",
  },
  {
    id: "#JAN-841",
    member: {
      img: "/images/user-19.jpg",
      name: "Daniel White",
    },
    email: "daniel@trezo.com",
    phone: "+1 555-987-3210",
    location: "Seattle",
    joiningDate: "23 Sep 2023",
    lastActive: "14 Dec 2024 09:09 PM",
  },
  {
    id: "#JAN-840",
    member: {
      img: "/images/user-20.jpg",
      name: "Isabella Brown",
    },
    email: "isabella@trezo.com",
    phone: "+1 555-123-7890",
    location: "Austin",
    joiningDate: "24 Aug 2023",
    lastActive: "15 Dec 2024 10:10 AM",
  },
  {
    id: "#JAN-839",
    member: {
      img: "/images/user-21.jpg",
      name: "James Garcia",
    },
    email: "james@trezo.com",
    phone: "+1 555-456-1230",
    location: "Denver",
    joiningDate: "25 Jul 2023",
    lastActive: "16 Dec 2024 12:12 PM",
  },
  {
    id: "#JAN-838",
    member: {
      img: "/images/user-22.jpg",
      name: "Charlotte Davis",
    },
    email: "charlotte@trezo.com",
    phone: "+1 555-789-4560",
    location: "Phoenix",
    joiningDate: "26 Jun 2023",
    lastActive: "17 Dec 2024 02:02 PM",
  },
  {
    id: "#JAN-837",
    member: {
      img: "/images/user-23.jpg",
      name: "Benjamin Martinez",
    },
    email: "benjamin@trezo.com",
    phone: "+1 555-321-7890",
    location: "Houston",
    joiningDate: "27 May 2023",
    lastActive: "18 Dec 2024 04:04 PM",
  },
  {
    id: "#JAN-836",
    member: {
      img: "/images/user-24.jpg",
      name: "Amelia Johnson",
    },
    email: "amelia@trezo.com",
    phone: "+1 555-654-7890",
    location: "Atlanta",
    joiningDate: "28 Apr 2023",
    lastActive: "19 Dec 2024 06:06 PM",
  },
  {
    id: "#JAN-835",
    member: {
      img: "/images/user-25.jpg",
      name: "Lucas Smith",
    },
    email: "lucas@trezo.com",
    phone: "+1 555-987-6540",
    location: "Dallas",
    joiningDate: "29 Mar 2023",
    lastActive: "20 Dec 2024 08:08 PM",
  },
];

const Members = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 10;
  const totalPages = Math.ceil(membersData.length / itemsPerPage);

  const handlePageChange = (newPage) => {
    if (newPage > 0 && newPage <= totalPages) {
      setCurrentPage(newPage);
    }
  };

  const displayedMembers = membersData.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="default-table-area all-products">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Member</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Location</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Last Active</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {displayedMembers.map((member, i) => (
                    <tr key={i}>
                      <td>{member.id}</td>

                      <td>
                        <div className="d-flex align-items-center gap-2">
                          <Image
                            src={member.member.img}
                            className="wh-40 rounded-circle"
                            alt="user"
                            width={40}
                            height={40}
                          />
                          <div>
                            <h6 className="fw-medium fs-14 mb-0">
                              {member.member.name}
                            </h6>
                          </div>
                        </div>
                      </td>

                      <td>{member.email}</td>

                      <td>{member.phone}</td>

                      <td>{member.location}</td>

                      <td>{member.joiningDate}</td>

                      <td>{member.lastActive}</td>

                      <td>
                        <div className="d-flex align-items-center gap-1">
                          <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                            <span className="material-symbols-outlined fs-16 text-primary">
                              visibility
                            </span>
                          </button>

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
            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
              <span className="fs-12 fw-medium">
                Showing {displayedMembers.length} of {membersData.length}{" "}
                Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <button
                      className="page-link icon"
                      onClick={() => handlePageChange(currentPage - 1)}
                      disabled={currentPage === 1}
                    >
                      <span className="material-symbols-outlined">
                        keyboard_arrow_left
                      </span>
                    </button>
                  </li>

                  {[...Array(totalPages)].map((_, index) => (
                    <li className="page-item" key={index}>
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
                      className="page-link icon"
                      onClick={() => handlePageChange(currentPage + 1)}
                      disabled={currentPage === totalPages}
                    >
                      <span className="material-symbols-outlined">
                        keyboard_arrow_right
                      </span>
                    </button>
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

export default Members;
