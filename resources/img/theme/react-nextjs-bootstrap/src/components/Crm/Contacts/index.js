"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Image from "next/image";

const contactsData = [
  {
    id: "#854",
    userImg: "/images/user-6.jpg",
    userName: "Oliver Khan",
    email: "oliver@trezo.com",
    phone: "+1 555-123-4567",
    lastContacted: "19 Jun 2024",
    company: "ABC Corporation",
    leadScore: 50,
    status: "active",
  },
  {
    id: "#853",
    userImg: "/images/user-7.jpg",
    userName: "Carolyn Barnes",
    email: "carolyn@trezo.com",
    phone: "+1 555-987-6543",
    lastContacted: "18 Jun 2024",
    company: "XYZ Ltd",
    leadScore: 35,
    status: "active",
  },
  {
    id: "#852",
    userImg: "/images/user-8.jpg",
    userName: "Donna Miller",
    email: "donna@trezo.com",
    phone: "+1 555-456-7890",
    lastContacted: "17 Jun 2024",
    company: "Tech Solutions",
    leadScore: 40,
    status: "deactive",
  },
  {
    id: "#851",
    userImg: "/images/user-9.jpg",
    userName: "Barbara Cross",
    email: "barbara@trezo.com",
    phone: "+1 555-369-7878",
    lastContacted: "16 Jun 2024",
    company: "Global Solutions",
    leadScore: 25,
    status: "active",
  },
  {
    id: "#850",
    userImg: "/images/user-10.jpg",
    userName: "Rebecca Block",
    email: "rebecca@trezo.com",
    phone: "+1 555-658-4488",
    lastContacted: "15 Jun 2024",
    company: "Acma Industries",
    leadScore: 27,
    status: "deactive",
  },
  {
    id: "#849",
    userImg: "/images/user-11.jpg",
    userName: "Ramiro McCarty",
    email: "ramiro@trezo.com",
    phone: "+1 555-558-9966",
    lastContacted: "14 Jun 2024",
    company: "Synergy Ltd",
    leadScore: 16,
    status: "active",
  },
  {
    id: "#848",
    userImg: "/images/user-12.jpg",
    userName: "Robert Fairweather",
    email: "robert@trezo.com",
    phone: "+1 555-357-5888",
    lastContacted: "13 Jun 2024",
    company: "Summit Solutions",
    leadScore: 38,
    status: "active",
  },
  {
    id: "#847",
    userImg: "/images/user-13.jpg",
    userName: "Marcelino Haddock",
    email: "marcelino@trezo.com",
    phone: "+1 555-456-8877",
    lastContacted: "12 Jun 2024",
    company: "Strategies Ltd",
    leadScore: 15,
    status: "active",
  },
  {
    id: "#846",
    userImg: "/images/user-14.jpg",
    userName: "Thomas Wilson",
    email: "thomas@trezo.com",
    phone: "+1 555-622-4488",
    lastContacted: "11 Jun 2024",
    company: "Tech Enterprises",
    leadScore: 41,
    status: "deactive",
  },
  {
    id: "#845",
    userImg: "/images/user-15.jpg",
    userName: "Nathaniel Hulsey",
    email: "nathaniel@trezo.com",
    phone: "+1 555-225-4488",
    lastContacted: "10 Jun 2024",
    company: "Synetic Solutions",
    leadScore: 29,
    status: "active",
  },
  {
    id: "#844",
    userImg: "/images/user-16.jpg",
    userName: "James Carter",
    email: "james@trezo.com",
    phone: "+1 555-777-1234",
    lastContacted: "09 Jun 2024",
    company: "Carter Inc.",
    leadScore: 42,
    status: "active",
  },
  {
    id: "#843",
    userImg: "/images/user-17.jpg",
    userName: "Sarah Johnson",
    email: "sarah@trezo.com",
    phone: "+1 555-888-5678",
    lastContacted: "08 Jun 2024",
    company: "Johnson & Co.",
    leadScore: 37,
    status: "deactive",
  },
  {
    id: "#842",
    userImg: "/images/user-18.jpg",
    userName: "Michael Evans",
    email: "michael@trezo.com",
    phone: "+1 555-999-6789",
    lastContacted: "07 Jun 2024",
    company: "Evans Solutions",
    leadScore: 28,
    status: "active",
  },
  {
    id: "#841",
    userImg: "/images/user-19.jpg",
    userName: "Jessica Lee",
    email: "jessica@trezo.com",
    phone: "+1 555-444-4321",
    lastContacted: "06 Jun 2024",
    company: "Lee Technologies",
    leadScore: 33,
    status: "active",
  },
  {
    id: "#840",
    userImg: "/images/user-20.jpg",
    userName: "David Wright",
    email: "david@trezo.com",
    phone: "+1 555-333-7890",
    lastContacted: "05 Jun 2024",
    company: "Wright Innovations",
    leadScore: 31,
    status: "deactive",
  },
  {
    id: "#839",
    userImg: "/images/user-21.jpg",
    userName: "Sophia Martinez",
    email: "sophia@trezo.com",
    phone: "+1 555-666-9876",
    lastContacted: "04 Jun 2024",
    company: "Martinez Ventures",
    leadScore: 45,
    status: "active",
  },
  {
    id: "#838",
    userImg: "/images/user-22.jpg",
    userName: "Daniel Foster",
    email: "daniel@trezo.com",
    phone: "+1 555-222-3456",
    lastContacted: "03 Jun 2024",
    company: "Foster & Partners",
    leadScore: 26,
    status: "active",
  },
  {
    id: "#837",
    userImg: "/images/user-23.jpg",
    userName: "Emily Adams",
    email: "emily@trezo.com",
    phone: "+1 555-111-6543",
    lastContacted: "02 Jun 2024",
    company: "Adams Group",
    leadScore: 30,
    status: "deactive",
  },
  {
    id: "#836",
    userImg: "/images/user-24.jpg",
    userName: "Matthew White",
    email: "matthew@trezo.com",
    phone: "+1 555-777-1234",
    lastContacted: "01 Jun 2024",
    company: "White Tech",
    leadScore: 39,
    status: "active",
  },
  {
    id: "#835",
    userImg: "/images/user-25.jpg",
    userName: "Olivia Brown",
    email: "olivia@trezo.com",
    phone: "+1 555-666-7890",
    lastContacted: "30 May 2024",
    company: "Brown Solutions",
    leadScore: 22,
    status: "active",
  },
];

const Contacts = () => {
  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  // Table
  const [searchTerm, setSearchTerm] = useState("");
  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 10;

  // Filter contacts based on search term
  const filteredContacts = contactsData.filter((contact) =>
    Object.values(contact).some((value) =>
      value.toString().toLowerCase().includes(searchTerm.toLowerCase())
    )
  );

  // Pagination logic
  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentContacts = filteredContacts.slice(
    indexOfFirstItem,
    indexOfLastItem
  );

  // Change page
  const paginate = (pageNumber) => setCurrentPage(pageNumber);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-0">
          <div className="p-4">
            <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
              <Form className="position-relative table-src-form me-0">
                <Form.Control
                  type="text"
                  placeholder="Search here"
                  value={searchTerm}
                  onChange={(e) => setSearchTerm(e.target.value)}
                />

                <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                  search
                </span>
              </Form>

              <div className="text-end">
                <button
                  className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
                  onClick={handleToggleShowModal}
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line"></i>
                    <span>Add New Contact</span>
                  </span>
                </button>
              </div>
            </div>
          </div>

          <div className="default-table-area style-two default-table-width">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <Form>
                        <Form.Check
                          type="checkbox"
                          id="default-checkbox"
                          label="ID"
                        />
                      </Form>
                    </th>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Last Contacted</th>
                    <th scope="col">Company</th>
                    <th scope="col">Lead Score</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {currentContacts.map((contact, i) => (
                    <tr key={i}>
                      <td className="text-body">
                        <Form>
                          <Form.Check
                            type="checkbox"
                            id={contact.id}
                            label={contact.id}
                          />
                        </Form>
                      </td>

                      <td>
                        <div href="#" className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={contact.userImg}
                              className="wh-34 rounded-circle"
                              alt="user"
                              width={34}
                              height={34}
                            />
                          </div>
                          <div className="flex-grow-1 ms-2 position-relative top-1">
                            <h6 className="mb-0 fs-14 fw-medium">
                              {contact.userName}
                            </h6>
                          </div>
                        </div>
                      </td>

                      <td className="text-body">{contact.email}</td>

                      <td>{contact.phone}</td>

                      <td className="text-body">{contact.lastContacted}</td>

                      <td className="text-body">{contact.company}</td>

                      <td className="text-body">{contact.leadScore}</td>

                      <td>
                        <span
                          className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${contact.status}`}
                        >
                          {contact.status}
                        </span>
                      </td>

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

              {/* Pagination */}
              <div className="p-4">
                <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                  <span className="fs-12 fw-medium">
                    Showing {indexOfFirstItem + 1} to{" "}
                    {Math.min(indexOfLastItem, filteredContacts.length)} of{" "}
                    {filteredContacts.length} Results
                  </span>

                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={() => paginate(currentPage - 1)}
                          disabled={currentPage === 1}
                        >
                          <span className="material-symbols-outlined">
                            keyboard_arrow_left
                          </span>
                        </button>
                      </li>

                      {Array.from(
                        {
                          length: Math.ceil(
                            filteredContacts.length / itemsPerPage
                          ),
                        },
                        (_, i) => (
                          <li key={i} className="page-item">
                            <button
                              className={`page-link ${
                                currentPage === i + 1 ? "active" : ""
                              }`}
                              onClick={() => paginate(i + 1)}
                            >
                              {i + 1}
                            </button>
                          </li>
                        )
                      )}

                      <li className="page-item">
                        <button
                          className="page-link icon"
                          onClick={() => paginate(currentPage + 1)}
                          disabled={
                            currentPage ===
                            Math.ceil(filteredContacts.length / itemsPerPage)
                          }
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
            </div>
          </div>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal right ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Add New Contact</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Form.Group className="mb-4">
                <Form.Label className="label">ID No</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="ID No"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">User Name</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="User Name"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Email</Form.Label>
                <Form.Control
                  type="email"
                  className="text-dark"
                  placeholder="Email"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Phone</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Phone"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Last Contacted</Form.Label>
                <Form.Control type="date" className="text-dark" />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Company</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Company"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Lead Score</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Lead Score"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Status</Form.Label>
                <Form.Select
                  className="form-control text-dark"
                  aria-label="Default select example"
                >
                  <option>Select</option>
                  <option defaultValue="0">Active</option>
                  <option defaultValue="1">Deactive</option>
                </Form.Select>
              </Form.Group>

              <Form.Group className="d-flex gap-3">
                <Button
                  variant="primary"
                  type="submit"
                  className="text-white fw-semibold py-2 px-2 px-sm-3"
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line text-white"></i>{" "}
                    <span>Create New Contact</span>
                  </span>
                </Button>
              </Form.Group>
            </Form>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default Contacts;
