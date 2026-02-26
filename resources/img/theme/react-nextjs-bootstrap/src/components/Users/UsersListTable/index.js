"use client";

import { Card, Table } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";
import SearchForm from "./SearchForm";
import Pagination from "./Pagination";

const userListData = [
  {
    userID: "#JAN-158",
    user: {
      img: "/images/user-6.jpg",
      name: "Marcia Baker",
    },
    email: "marcia@trezo.com",
    location: "Washington D.C",
    phone: "+1 555-445-4455",
    projects: 6,
    joinDate: "01 Dec 2024",
  },
  {
    userID: "#JAN-325",
    user: {
      img: "/images/user-7.jpg",
      name: "Carolyn Barnes",
    },
    email: "barnes@trezo.com",
    location: "Chicago",
    phone: "+1 555-455-9966",
    projects: 10,
    joinDate: "02 Dec 2024",
  },
  {
    userID: "#JAN-286",
    user: {
      img: "/images/user-8.jpg",
      name: "Donna Miller",
    },
    email: "donna@trezo.com",
    location: "Oklahoma City",
    phone: "+1 555-555-9922",
    projects: 6,
    joinDate: "03 Dec 2024",
  },
  {
    userID: "#JAN-463",
    user: {
      img: "/images/user-9.jpg",
      name: "Barbara Cross",
    },
    email: "cross@trezo.com",
    location: "San Diego",
    phone: "+1 555-445-7788",
    projects: 4,
    joinDate: "04 Dec 2024",
  },
  {
    userID: "#JAN-491",
    user: {
      img: "/images/user-10.jpg",
      name: "Rebecca Block",
    },
    email: "block@trezo.com",
    location: "Los Angeles",
    phone: "+1 555-333-2288",
    projects: 2,
    joinDate: "05 Dec 2024",
  },
  {
    userID: "#JAN-860",
    user: {
      img: "/images/user-11.jpg",
      name: "Ramiro McCarty",
    },
    email: "ramiro@trezo.com",
    location: "Las Vegas",
    phone: "+1 555-445-4455",
    projects: 8,
    joinDate: "06 Dec 2024",
  },
  {
    userID: "#JAN-431",
    user: {
      img: "/images/user-12.jpg",
      name: "Robert Fairweather",
    },
    email: "robert@trezo.com",
    location: "San Francisco",
    phone: "+1 555-555-9922",
    projects: 6,
    joinDate: "07 Dec 2024",
  },
  {
    userID: "#JAN-998",
    user: {
      img: "/images/user-13.jpg",
      name: "Marcelino Haddock",
    },
    email: "haddock@trezo.com",
    location: "Washington D.C",
    phone: "+1 555-455-9966",
    projects: 9,
    joinDate: "08 Dec 2024",
  },
  {
    userID: "#JAN-436",
    user: {
      img: "/images/user-14.jpg",
      name: "Thomas Wilson",
    },
    email: "wildon@trezo.com",
    location: "San Diego",
    phone: "+1 555-333-2288",
    projects: 5,
    joinDate: "10 Dec 2024",
  },
  {
    userID: "#JAN-125",
    user: {
      img: "/images/user-15.jpg",
      name: "Nathaniel Hulsey",
    },
    email: "hulsey@trezo.com",
    location: "Chicago",
    phone: "+1 555-445-7788",
    projects: 6,
    joinDate: "11 Dec 2024",
  },
];

const UsersListTable = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <SearchForm />

            <Link
              href="/users/add-user/"
              className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line d-none d-sm-inline-block"></i>{" "}
                <span>Add New User</span>
              </span>
            </Link>
          </div>

          <div className="default-table-area all-products">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Location</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Projects</th>
                    <th scope="col">Join Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  {userListData &&
                    userListData.slice(0, 10).map((value, i) => (
                      <tr key={i}>
                        <td>{value.userID}</td>
                        <td>
                          <div className="d-flex align-items-center">
                            <Image
                              src={value.user.img}
                              className="wh-40 rounded-circle"
                              alt="user"
                              width={40}
                              height={40}
                            />
                            <div className="ms-2 ps-1">
                              <h6 className="fw-medium fs-14 m-0">
                                {value.user.name}
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>{value.email}</td>
                        <td>{value.location}</td>
                        <td>{value.phone}</td>
                        <td>{value.projects}</td>
                        <td>{value.joinDate}</td>
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
            <Pagination />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default UsersListTable;
