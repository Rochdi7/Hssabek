"use client";

import React, { useState } from "react";
import { Card, Form, Table, Button } from "react-bootstrap";
import Image from "next/image";

const categoriesData = [
  {
    image: "/images/product-1.jpg",
    name: "Watch",
    totalProducts: 54,
    slug: "watch",
    description: "Timepieces for every occasion.",
    status: "active",
  },
  {
    image: "/images/product-2.jpg",
    name: "Headphone",
    totalProducts: 13,
    slug: "headphone",
    description: "High-quality audio devices.",
    status: "active",
  },
  {
    image: "/images/product-3.jpg",
    name: "Mobile",
    totalProducts: 42,
    slug: "mobile",
    description: "Latest smartphones and accessories.",
    status: "deactive",
  },
  {
    image: "/images/product-4.jpg",
    name: "Speaker",
    totalProducts: 32,
    slug: "speaker",
    description: "Portable and home speakers.",
    status: "active",
  },
  {
    image: "/images/product-5.jpg",
    name: "Electronics",
    totalProducts: 100,
    slug: "electronics",
    description: "Wide range of electronic gadgets.",
    status: "active",
  },
  {
    image: "/images/product-6.jpg",
    name: "Fashion",
    totalProducts: 80,
    slug: "fashion",
    description: "Trendy apparel and accessories.",
    status: "active",
  },
  {
    image: "/images/product-7.jpg",
    name: "Furniture",
    totalProducts: 25,
    slug: "furniture",
    description: "Modern and classic furniture pieces.",
    status: "active",
  },
  {
    image: "/images/product-8.jpg",
    name: "Beauty",
    totalProducts: 60,
    slug: "beauty",
    description: "Skincare and cosmetic products.",
    status: "active",
  },
  {
    image: "/images/product-9.jpg",
    name: "Sports",
    totalProducts: 45,
    slug: "sports",
    description: "Equipment and apparel for sports.",
    status: "active",
  },
  {
    image: "/images/product-10.jpg",
    name: "Books",
    totalProducts: 70,
    slug: "books",
    description: "Wide range of literature and educational materials.",
    status: "active",
  },
];

const CategoriesTable = () => {
  // Pagination
  const [currentPage, setCurrentPage] = useState(1);
  const [itemsPerPage] = useState(5);

  // Search State
  const [searchQuery, setSearchQuery] = useState("");

  // Filter categories based on search
  const filteredCategories = categoriesData.filter((item) =>
    item.name.toLowerCase().includes(searchQuery.toLowerCase())
  );

  // Calculate pagination values
  const totalItems = filteredCategories.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const endIndex = Math.min(startIndex + itemsPerPage, totalItems);
  const currentItems = filteredCategories.slice(startIndex, endIndex);

  // Pagination handlers
  const handlePrevious = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  const handleNext = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  const handleSearchChange = (e) => {
    setSearchQuery(e.target.value);
    setCurrentPage(1); // Reset to first page on search
  };

  // Modal
  const [isShowModal, setShowModal] = useState("false");
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-lg-4 mb-3">
            <Form className="position-relative table-src-form me-0">
              <Form.Control
                type="text"
                placeholder="Search here"
                value={searchQuery}
                onChange={handleSearchChange}
              />

              <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>

            <button
              className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
              onClick={handleToggleShowModal}
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line d-none d-sm-inline-block fs-18"></i>
                <span>Add New Categorie</span>
              </span>
            </button>
          </div>

          <div className="default-table-area ec-recent-orders">
            <div className="table-responsive">
              <Table className="align-middle">
                <thead>
                  <tr>
                    <th scope="col">
                      <Form>
                        <Form.Check
                          type="checkbox"
                          id="default-checkbox"
                          label=""
                        />
                      </Form>
                    </th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total Products</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  {currentItems.length > 0 ? (
                    currentItems.map((item, i) => (
                      <tr key={i}>
                        <td>
                          <Form>
                            <Form.Check
                              type="checkbox"
                              id="default-checkbox"
                              label=""
                            />
                          </Form>
                        </td>

                        <td>
                          <Image
                            src={item.image}
                            className="wh-40 rounded-100"
                            alt="product-1"
                            width={40}
                            height={40}
                          />
                        </td>

                        <td>{item.name}</td>

                        <td>{item.totalProducts}</td>

                        <td>{item.slug}</td>

                        <td>{item.description}</td>

                        <td>
                          <span
                            className={`badge bg-opacity-10 p-2 fs-12 fw-normal text-capitalize ${item.status}`}
                          >
                            {item.status}
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
                    ))
                  ) : (
                    <tr>
                      <td colSpan="8" className="text-center">
                        No results found
                      </td>
                    </tr>
                  )}
                </tbody>
              </Table>
            </div>

            {/* Pagination */}
            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
              <span className="fs-13 fw-medium">
                Showing {startIndex + 1} - {endIndex} of {totalItems} items
              </span>

              <div className="d-flex align-items-center">
                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li className="page-item">
                      <button
                        className={`page-link icon ${
                          currentPage === 1 ? "disabled" : ""
                        }`}
                        onClick={handlePrevious}
                        disabled={currentPage === 1}
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_left
                        </span>
                      </button>
                    </li>

                    {Array.from({ length: totalPages }, (_, i) => i + 1).map(
                      (num) => (
                        <li key={num} className="page-item">
                          <button
                            className={`page-link ${
                              currentPage === num ? "active" : ""
                            }`}
                            onClick={() => setCurrentPage(num)}
                          >
                            {num}
                          </button>
                        </li>
                      )
                    )}

                    <li className="page-item">
                      <button
                        className={`page-link icon ${
                          currentPage === totalPages ? "disabled" : ""
                        }`}
                        onClick={handleNext}
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
          </div>
        </Card.Body>
      </Card>

      {/* Modal */}
      <div className={`custom-modal right ${isShowModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0"> Add New Categorie</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Form.Group className="mb-4">
                <Form.Label className="label">Image</Form.Label>
                <Form.Control type="file" className="text-dark" />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Name</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Name"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Total Products</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Total Products"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Slug</Form.Label>
                <Form.Control
                  type="text"
                  className="text-dark"
                  placeholder="Slug"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label className="label">Description</Form.Label>
                <Form.Control
                  as="textarea"
                  className="text-dark"
                  placeholder="Description"
                  style={{ height: "100px" }}
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
                    <span>Create New Categorie</span>
                  </span>
                </Button>
              </Form.Group>
            </Form>
          </div>
        </div>
      </div>
    </>
  );
};

export default CategoriesTable;
