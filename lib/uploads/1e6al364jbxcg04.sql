SELECT 
  adempiere.m_product_acct.p_asset_acct
FROM
  adempiere.m_product
  INNER JOIN adempiere.m_product_category ON (adempiere.m_product.m_product_category_id = adempiere.m_product_category.m_product_category_id)
  INNER JOIN adempiere.m_product_acct ON (adempiere.m_product.m_product_id = adempiere.m_product_acct.m_product_id)
WHERE
  adempiere.m_product_category.m_product_category_id = 1000062


UPDATE m_product_acct set p_asset_acct = 10001 WHERE p_asset_acct IN (SELECT 
m_product_acct.p_asset_acct
FROM
  m_product
  INNER JOIN m_product_category ON (m_product.m_product_category_id = m_product_category.m_product_category_id)
  INNER JOIN m_product_acct ON (m_product.m_product_id = m_product_acct.m_product_id)
WHERE
  m_product_category.m_product_category_id = 1000062)


