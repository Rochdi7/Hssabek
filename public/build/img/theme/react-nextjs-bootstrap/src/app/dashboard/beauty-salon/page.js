import CustomerSatisfactionRate from "@/components/Dashboard/BeautySalon/CustomerSatisfactionRate";
import CustomersFromChannels from "@/components/Dashboard/BeautySalon/CustomersFromChannels";
import FeaturedServices from "@/components/Dashboard/BeautySalon/FeaturedServices";
import NewCustomerThisMonth from "@/components/Dashboard/BeautySalon/NewCustomerThisMonth";
import RecentAppointment from "@/components/Dashboard/BeautySalon/RecentAppointment";
import RevenueByServices from "@/components/Dashboard/BeautySalon/RevenueByServices";
import TopCustomers from "@/components/Dashboard/BeautySalon/TopCustomers";
import TopSellingProducts from "@/components/Dashboard/BeautySalon/TopSellingProducts";
import TopStylistPerformance from "@/components/Dashboard/BeautySalon/TopStylistPerformance";
import Welcome from "@/components/Dashboard/BeautySalon/Welcome";
import { Row, Col } from "react-bootstrap";

export default function Page() {
  return (
    <>
      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={6}>
          <Welcome />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={6}>
          <Row>
            <Col xs={12} sm={6}>
              <CustomerSatisfactionRate />
            </Col>

            <Col xs={12} sm={6}>
              <NewCustomerThisMonth />
            </Col>
          </Row>
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={8}>
          <TopSellingProducts />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={4}>
          <CustomersFromChannels />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={4} xl={4} xxl={4}>
          <FeaturedServices />
        </Col>

        <Col xs={12} sm={12} md={12} lg={8} xl={8} xxl={8}>
          <RecentAppointment />
        </Col>
      </Row>

      <Row>
        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={8}>
          <RevenueByServices />
        </Col>

        <Col xs={12} sm={12} md={12} lg={12} xl={12} xxl={4}>
          <TopStylistPerformance />
        </Col>
      </Row>

      <TopCustomers />
    </>
  );
}
