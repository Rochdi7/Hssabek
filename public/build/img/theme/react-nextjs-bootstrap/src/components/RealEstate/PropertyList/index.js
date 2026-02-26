"use client";

import { useState } from "react";
import { Card, Button, Row, Col, Dropdown, Form } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

// Example property data array
const properties = [
  {
    id: 1,
    location: "New York",
    price: "$18,000",
    status: "Sale",
    address: "35 Prince Consort Road",
    imageSrc: "/images/property-5.png",
    bedrooms: 6,
    bathrooms: 5,
    sqft: 1800,
    agent: {
      name: "Harold Cook",
      image: "/images/user-1.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 2,
    location: "London",
    price: "$220,000",
    status: "Rent",
    address: "58 Gateway Road Portland",
    imageSrc: "/images/property-6.png",
    bedrooms: 8,
    bathrooms: 6,
    sqft: 2000,
    agent: {
      name: "Debra Sisk",
      image: "/images/user-2.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 3,
    location: "France",
    price: "$350,000",
    status: "Sold",
    address: "18 Chemin Challet",
    imageSrc: "/images/property-7.png",
    bedrooms: 6,
    bathrooms: 5,
    sqft: 1800,
    agent: {
      name: "Harold Cook",
      image: "/images/user-3.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 4,
    location: "Australia",
    price: "$158,000",
    status: "Rent",
    address: "51 Decca Road GUNN",
    imageSrc: "/images/property-8.png",
    bedrooms: 8,
    bathrooms: 8,
    sqft: 2000,
    agent: {
      name: "Steven Bryant",
      image: "/images/user-4.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 5,
    location: "Italy",
    price: "$99,000",
    status: "Sold",
    address: "35 Vicolo Tre Marchetti",
    imageSrc: "/images/property-9.png",
    bedrooms: 6,
    bathrooms: 6,
    sqft: 1500,
    agent: {
      name: "Jannie James",
      image: "/images/user-5.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 6,
    location: "Germany",
    price: "$110,000",
    status: "Sale",
    address: "Ansbacher Strasse 44",
    imageSrc: "/images/property-10.png",
    bedrooms: 10,
    bathrooms: 10,
    sqft: 2500,
    agent: {
      name: "Larry Greenberg",
      image: "/images/user-6.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 7,
    location: "Poland",
    price: "$150,000",
    status: "Rent",
    address: "Czerwonych Beretów 124",
    imageSrc: "/images/property-11.png",
    bedrooms: 6,
    bathrooms: 6,
    sqft: 1500,
    agent: {
      name: "Kara Spangler",
      image: "/images/user-7.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 8,
    location: "Norway",
    price: "$120,000",
    status: "Rent",
    address: "Moeneveien 228 VARTEIG",
    imageSrc: "/images/property-12.png",
    bedrooms: 5,
    bathrooms: 5,
    sqft: 1400,
    agent: {
      name: "Benjamin Dinh",
      image: "/images/user-7.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
  {
    id: 9,
    location: "Netherland",
    price: "$190,000",
    status: "Sale",
    address: "Overburgkade 23",
    imageSrc: "/images/property-13.png",
    bedrooms: 7,
    bathrooms: 7,
    sqft: 1900,
    agent: {
      name: "Jane Wright",
      image: "/images/user-8.jpg",
      role: "Owner",
      detailsLink: "/real-estate/agent-overview/",
    },
    viewMore: '/real-estate/property-overview',
  },
];

const PropertyList = () => {
  const propertiesPerPage = 6; // You can change this to control how many properties to show per page
  const [currentPage, setCurrentPage] = useState(1);
  const [searchQuery, setSearchQuery] = useState(""); // State for the search query

  // Filter properties based on the search query
  const filteredProperties = properties.filter(
    (property) =>
      property.location.toLowerCase().includes(searchQuery.toLowerCase()) ||
      property.price.toLowerCase().includes(searchQuery.toLowerCase()) ||
      property.address.toLowerCase().includes(searchQuery.toLowerCase())
  );

  // Calculate the properties to display for the current page
  const indexOfLastProperty = currentPage * propertiesPerPage;
  const indexOfFirstProperty = indexOfLastProperty - propertiesPerPage;
  const currentProperties = filteredProperties.slice(
    indexOfFirstProperty,
    indexOfLastProperty
  );

  // Calculate the total number of pages
  const totalPages = Math.ceil(filteredProperties.length / propertiesPerPage);

  // Handlers for page navigation
  const handleNextPage = () => {
    if (currentPage < totalPages) setCurrentPage(currentPage + 1);
  };

  const handlePrevPage = () => {
    if (currentPage > 1) setCurrentPage(currentPage - 1);
  };

  return (
    <>
      <Row className="pb-4">
        <Col sm={5}>
          <div className="pe-md-5 me-md-5">
            <Form className="src-form position-relative">
              <input
                type="text"
                className="form-control"
                style={{ height: "45px" }}
                placeholder="Search here..."
                value={searchQuery} // Bind input value to the state
                onChange={(e) => setSearchQuery(e.target.value)} // Update search query on input change
              />
              <button
                type="submit"
                className="position-absolute top-50 end-0 translate-middle-y bg-transparent p-0 border-0"
              >
                <span className="material-symbols-outlined position-relative top-5 text-primary pe-2">
                  search
                </span>
              </button>
            </Form>
          </div>
        </Col>

        <Col sm={7} className="text-sm-end text-center mt-3 mt-sm-0">
          <Link
            href="/real-estate/add-property/"
            className="btn btn-outline-primary py-1 px-2 px-sm-4 fs-14 fw-medium rounded-3 hover-bg"
          >
            <i className="ri-add-line d-none d-sm-inline-block"></i>
            <span>Add Property</span>
          </Link>
        </Col>
      </Row>

      <Row>
        {currentProperties.map((property) => (
          <Col sm={6} xl={6} xxl={4} key={property.id}>
            <Card className="border-0 rounded-3 bg-white property-list-hover mb-4">
              <Card.Body className="p-4">
                <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
                  <Link
                    href={property.viewMore}
                    className="text-decoration-none"
                  >
                    <h3 className="mb-0">{property.location}</h3>
                  </Link>

                  <Dropdown className="action-opt">
                    <Dropdown.Toggle
                      variant="secondary"
                      id="dropdown-basic"
                      className="bg-transparent p-0"
                    >
                      <i className="material-symbols-outlined">more_horiz</i>
                    </Dropdown.Toggle>

                    <Dropdown.Menu className="bg-white border box-shadow">
                      <Dropdown.Item href="#">
                        <i className="ri-edit-line"></i> Edit
                      </Dropdown.Item>
                      <Dropdown.Item href="#">
                        <i className="material-symbols-outlined">
                          visibility
                        </i>{" "}
                        View
                      </Dropdown.Item>
                      <Dropdown.Item href="#">
                        <i className="material-symbols-outlined">delete</i>{" "}
                        Delete
                      </Dropdown.Item>
                    </Dropdown.Menu>
                  </Dropdown>
                </div>

                <Link
                  href={property.viewMore}
                  className="text-decoration-none d-block mb-4"
                >
                  <Image
                    src={property.imageSrc}
                    className="rounded-2"
                    alt="property"
                    width={1240}
                    height={600}
                  />
                </Link>

                <div className="d-flex justify-content-between mb-3">
                  <h3 className="mb-0 text-danger">{property.price}</h3>
                  <span
                    className={`text-${
                      property.status === "Sale"
                        ? "danger"
                        : property.status === "Rent"
                        ? "primary"
                        : "success"
                    } 
                  bg-${
                    property.status === "Sale"
                      ? "danger"
                      : property.status === "Rent"
                      ? "primary"
                      : "success"
                  } 
                  bg-opacity-10 d-inline-block fs-12 px-2 rounded-2`}
                  >
                    {property.status}
                  </span>
                </div>
                <div className="d-flex align-items-center mb-3">
                  <span className="material-symbols-outlined fs-20 text-primary">
                    location_on
                  </span>
                  <span className="ms-1">{property.address}</span>
                </div>
                <ul className="ps-0 mb-0 list-unstyled d-flex flex-wrap gap-2 gap-md-4 border-top border-bottom py-2 mb-4">
                  <li>
                    <div className="d-flex align-items-center">
                      <span className="material-symbols-outlined fs-18 text-danger">
                        bed
                      </span>
                      <span className="ms-2">{property.bedrooms} Bed</span>
                    </div>
                  </li>
                  <li>
                    <div className="d-flex align-items-center">
                      <span className="material-symbols-outlined fs-18 text-danger">
                        bathtub
                      </span>
                      <span className="ms-2">{property.bathrooms} Bath</span>
                    </div>
                  </li>
                  <li>
                    <div className="d-flex align-items-center">
                      <span className="material-symbols-outlined fs-18 text-danger">
                        square_foot
                      </span>
                      <span className="ms-2">{property.sqft} sqft</span>
                    </div>
                  </li>
                </ul>

                <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                  <Link
                    href={property.agent.detailsLink}
                    className="d-flex align-items-center text-decoration-none"
                  >
                    <div className="flex-shrink-0">
                      <Image
                        src={property.agent.image}
                        className="rounded-circle border border-white"
                        alt="user"
                        width={40}
                        height={40}
                      />
                    </div>
                    <div className="flex-grow-1 ms-2">
                      <h4 className="mb-0 fs-16 fw-semibold">
                        {property.agent.name}
                      </h4>
                      <span className="fs-13 text-body">
                        {property.agent.role}
                      </span>
                    </div>
                  </Link>
                  <Link
                    href={property.viewMore}
                    className="text-primary fs-15 text-decoration-none read"
                  >
                    View More
                  </Link>
                </div>
              </Card.Body>
            </Card>
          </Col>
        ))}

        <Col sm={12}>
          <Card className="border-0 bg-white p-4 mb-4 rounded-3">
            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
              <span className="fs-12 fw-medium">
                Showing {currentProperties.length} of {filteredProperties.length}{" "}
                Results
              </span>

              <nav aria-label="Page navigation example">
                <ul className="pagination mb-0 justify-content-center">
                  <li className="page-item">
                    <Button className="page-link icon" onClick={handlePrevPage}>
                      <i className="material-symbols-outlined">
                        keyboard_arrow_left
                      </i>
                    </Button>
                  </li>
                  <li className="page-item">
                    <Button className="page-link icon" onClick={handleNextPage}>
                      <i className="material-symbols-outlined">
                        keyboard_arrow_right
                      </i>
                    </Button>
                  </li>
                </ul>
              </nav>
            </div>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default PropertyList;
