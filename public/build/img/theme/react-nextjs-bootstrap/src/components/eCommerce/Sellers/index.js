"use client";

import React, { useState } from "react";
import { Row, Col, Dropdown, Card, Form } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

// Seller data
const sellersData = [
  {
    id: 1,
    image: "/images/seller-1.png",
    name: "Ava Turner",
    email: "turner@trezo.com",
    lastSaleDate: "25 Nov 2024",
    itemStock: 50,
    walletBalance: "$9,999.50",
    revenue: "$5,999.50",
    store: "TechMaster Store",
  },
  {
    id: 2,
    image: "/images/seller-2.png",
    name: "Ethan Parker",
    email: "ethan@trezo.com",
    lastSaleDate: "01 Nov 2024",
    itemStock: 39,
    walletBalance: "$6,756.50",
    revenue: "$4,645.50",
    store: "RisionTech Outlet",
  },
  {
    id: 3,
    image: "/images/seller-3.png",
    name: "Isabella Carter",
    email: "isabella@trezo.com",
    lastSaleDate: "30 Sep 2024",
    itemStock: 75,
    walletBalance: "$5,550.00",
    revenue: "$4,350.50",
    store: "ComfotLiving",
  },
  {
    id: 4,
    image: "/images/seller-4.png",
    name: "Liam Johnson",
    email: "liam@trezo.com",
    lastSaleDate: "20 Aug 2024",
    itemStock: 45,
    walletBalance: "$8,200.00",
    revenue: "$6,150.00",
    store: "HomeGadget Hub",
  },
  {
    id: 5,
    image: "/images/seller-5.png",
    name: "Sophia Williams",
    email: "sophia@trezo.com",
    lastSaleDate: "10 Jul 2024",
    itemStock: 62,
    walletBalance: "$7,500.50",
    revenue: "$5,750.00",
    store: "Fashion Empire",
  },
  {
    id: 6,
    image: "/images/seller-6.png",
    name: "Oliver Davis",
    email: "oliver@trezo.com",
    lastSaleDate: "05 Jun 2024",
    itemStock: 80,
    walletBalance: "$9,000.00",
    revenue: "$7,300.00",
    store: "Smart Tech Store",
  },
  {
    id: 7,
    image: "/images/seller-7.png",
    name: "Mia Martinez",
    email: "mia@trezo.com",
    lastSaleDate: "18 May 2024",
    itemStock: 40,
    walletBalance: "$6,100.00",
    revenue: "$3,950.00",
    store: "Trendy Wear",
  },
  {
    id: 8,
    image: "/images/seller-8.png",
    name: "Noah Brown",
    email: "noah@trezo.com",
    lastSaleDate: "10 Apr 2024",
    itemStock: 30,
    walletBalance: "$5,200.00",
    revenue: "$2,800.00",
    store: "Auto Parts Hub",
  },
  {
    id: 9,
    image: "/images/seller-9.png",
    name: "Charlotte Wilson",
    email: "charlotte@trezo.com",
    lastSaleDate: "02 Mar 2024",
    itemStock: 55,
    walletBalance: "$8,750.00",
    revenue: "$6,500.00",
    store: "Elegant Decor",
  },
  {
    id: 10,
    image: "/images/seller-10.png",
    name: "James Anderson",
    email: "james@trezo.com",
    lastSaleDate: "15 Feb 2024",
    itemStock: 70,
    walletBalance: "$10,000.00",
    revenue: "$7,850.00",
    store: "Gizmo World",
  },
  {
    id: 11,
    image: "/images/seller-11.png",
    name: "Amelia Thomas",
    email: "amelia@trezo.com",
    lastSaleDate: "28 Jan 2024",
    itemStock: 33,
    walletBalance: "$4,800.00",
    revenue: "$3,200.00",
    store: "Beauty Bliss",
  },
  {
    id: 12,
    image: "/images/seller-12.png",
    name: "William Taylor",
    email: "william@trezo.com",
    lastSaleDate: "12 Dec 2023",
    itemStock: 90,
    walletBalance: "$11,500.00",
    revenue: "$9,400.00",
    store: "Home Essentials",
  },
  {
    id: 13,
    image: "/images/seller-1.png",
    name: "Ella Harris",
    email: "ella@trezo.com",
    lastSaleDate: "03 Nov 2023",
    itemStock: 20,
    walletBalance: "$3,500.00",
    revenue: "$2,600.00",
    store: "Organic Groceries",
  },
  {
    id: 14,
    image: "/images/seller-2.png",
    name: "Benjamin Clark",
    email: "benjamin@trezo.com",
    lastSaleDate: "21 Oct 2023",
    itemStock: 55,
    walletBalance: "$7,200.00",
    revenue: "$5,900.00",
    store: "Tech Haven",
  },
  {
    id: 15,
    image: "/images/seller-3.png",
    name: "Harper Lewis",
    email: "harper@trezo.com",
    lastSaleDate: "05 Sep 2023",
    itemStock: 80,
    walletBalance: "$9,900.00",
    revenue: "$8,200.00",
    store: "Outdoor Gear Pro",
  },
  {
    id: 16,
    image: "/images/seller-4.png",
    name: "Elijah Walker",
    email: "elijah@trezo.com",
    lastSaleDate: "18 Aug 2023",
    itemStock: 46,
    walletBalance: "$6,300.00",
    revenue: "$4,700.00",
    store: "Gaming Central",
  },
  {
    id: 17,
    image: "/images/seller-5.png",
    name: "Lily Hall",
    email: "lily@trezo.com",
    lastSaleDate: "29 Jul 2023",
    itemStock: 61,
    walletBalance: "$7,850.00",
    revenue: "$6,100.00",
    store: "Luxury Accessories",
  },
  {
    id: 18,
    image: "/images/seller-6.png",
    name: "Henry Young",
    email: "henry@trezo.com",
    lastSaleDate: "10 Jun 2023",
    itemStock: 75,
    walletBalance: "$9,500.00",
    revenue: "$8,300.00",
    store: "Pet Supplies Market",
  },
  {
    id: 19,
    image: "/images/seller-7.png",
    name: "Zoe King",
    email: "zoe@trezo.com",
    lastSaleDate: "24 May 2023",
    itemStock: 32,
    walletBalance: "$4,400.00",
    revenue: "$3,100.00",
    store: "DIY Crafts Corner",
  },
  {
    id: 20,
    image: "/images/seller-9.png",
    name: "Daniel Scott",
    email: "daniel@trezo.com",
    lastSaleDate: "08 Apr 2023",
    itemStock: 95,
    walletBalance: "$12,000.00",
    revenue: "$10,500.00",
    store: "Mega Electronics",
  },
];

const ITEMS_PER_PAGE = 12; // Number of items per page

const Sellers = () => {
  const [searchTerm, setSearchTerm] = useState("");
  const [currentPage, setCurrentPage] = useState(1);

  // Filter sellers based on search input
  const filteredSellers = sellersData.filter(
    (seller) =>
      seller.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
      seller.email.toLowerCase().includes(searchTerm.toLowerCase()) ||
      seller.store.toLowerCase().includes(searchTerm.toLowerCase())
  );

  // Calculate total number of pages
  const totalPages = Math.ceil(filteredSellers.length / ITEMS_PER_PAGE);

  // Get current page items
  const indexOfLastItem = currentPage * ITEMS_PER_PAGE;
  const indexOfFirstItem = indexOfLastItem - ITEMS_PER_PAGE;
  const currentItems = filteredSellers.slice(indexOfFirstItem, indexOfLastItem);

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2">
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

            <Link
              href="/ecommerce/sellers/create/"
              className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
            >
              <span className="py-sm-1 d-block">
                <i className="ri-add-line d-none d-sm-inline-block"></i>
                <span>Add New Seller</span>
              </span>
            </Link>
          </div>
        </Card.Body>
      </Card>

      <Row>
        {currentItems.length > 0 ? (
          currentItems.map((seller) => (
            <Col key={seller.id} sm={6} lg={4} xxl={3}>
              <Card className="bg-white border-0 rounded-3 mb-4">
                <Card.Body className="p-4">
                  <div className="d-flex justify-content-between align-items-center mb-4">
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0">
                        <Image
                          src={seller.image}
                          className="wh-52"
                          alt="seller"
                          width={52}
                          height={52}
                        />
                      </div>
                      <div className="flex-grow-1 ms-3">
                        <Link
                          href="/ecommerce/sellers/details/"
                          className="text-decoration-none text-secondary fw-medium fs-16 mb-1"
                        >
                          {seller.name}
                        </Link>
                        <span className="d-block">{seller.email}</span>
                      </div>
                    </div>

                    <Dropdown className="action-opt ms-2 position-relative top-3">
                      <Dropdown.Toggle
                        variant="secondary"
                        id="dropdown-basic"
                        className="bg-transparent p-0"
                      >
                        <span className="material-symbols-outlined">
                          more_horiz
                        </span>
                      </Dropdown.Toggle>

                      <Dropdown.Menu className="bg-white border box-shadow">
                        <Dropdown.Item href="#">
                          <i className="material-symbols-outlined">
                            visibility
                          </i>
                          View
                        </Dropdown.Item>

                        <Dropdown.Item href="#">
                          <span className="material-symbols-outlined">
                            edit
                          </span>
                          Edit
                        </Dropdown.Item>

                        <Dropdown.Item href="#">
                          <i className="material-symbols-outlined">delete</i>
                          Delete
                        </Dropdown.Item>
                      </Dropdown.Menu>
                    </Dropdown>
                  </div>

                  <div className="d-flex align-items-center mb-3">
                    <span>Last Sale Date:</span>
                    <span className="text-secondary ms-1">
                      {seller.lastSaleDate}
                    </span>
                  </div>
                  <div className="d-flex align-items-center mb-3">
                    <span>Item Stock:</span>
                    <span className="text-secondary ms-1">
                      {seller.itemStock}
                    </span>
                  </div>
                  <div className="d-flex align-items-center mb-3">
                    <span>Wallet Balance:</span>
                    <span className="text-secondary ms-1">
                      {seller.walletBalance}
                    </span>
                  </div>
                  <div className="d-flex align-items-center mb-3">
                    <span>Revenue:</span>
                    <span className="text-secondary ms-1">
                      {seller.revenue}
                    </span>
                  </div>
                  <div className="d-flex align-items-center mb-0">
                    <span>Store:</span>
                    <span className="text-secondary ms-1">{seller.store}</span>
                  </div>
                </Card.Body>
              </Card>
            </Col>
          ))
        ) : (
          <Col>
            <p className="text-center">No sellers found.</p>
          </Col>
        )}

        {/* Pagination */}
        {filteredSellers.length > ITEMS_PER_PAGE && (
          <Col sm={12} lg={12}>
            <Card className="bg-white border-0 rounded-3 mb-4">
              <Card.Body className="p-4">
                <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                  <span className="fs-12 fw-medium">
                    Showing {currentItems.length} of{" "}
                    {filteredSellers.length} Sellers
                  </span>

                  <nav aria-label="Page navigation example">
                    <ul className="pagination mb-0 justify-content-center">
                      <li className="page-item">
                        <button
                          className={`page-link icon ${
                            currentPage === 1 ? "disabled" : ""
                          }`}
                          onClick={() =>
                            setCurrentPage((prev) => Math.max(prev - 1, 1))
                          }
                        >
                          <span className="material-symbols-outlined fs-24">
                            keyboard_arrow_left
                          </span>
                        </button>
                      </li>

                      {[...Array(totalPages)].map((_, index) => (
                        <li key={index} className="page-item">
                          <button
                            className={`page-link ${
                              currentPage === index + 1 ? "active" : ""
                            }`}
                            onClick={() => setCurrentPage(index + 1)}
                          >
                            {index + 1}
                          </button>
                        </li>
                      ))}

                      <li className="page-item">
                        <button
                          className={`page-link icon ${
                            currentPage === totalPages ? "disabled" : ""
                          }`}
                          onClick={() =>
                            setCurrentPage((prev) =>
                              Math.min(prev + 1, totalPages)
                            )
                          }
                        >
                          <span className="material-symbols-outlined fs-24">
                            keyboard_arrow_right
                          </span>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </div>
              </Card.Body>
            </Card>
          </Col>
        )}
      </Row>
    </>
  );
};

export default Sellers;